<?php

class Property
{
    private $conn;
    private $table_name = 'properties';
    private $pics_table = 'property_pics';

    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $rooms;
    public $washrooms;
    public $area_size;
    public $state;
    public $town;
    public $address;
    public $color;
    public $brand;
    public $drive;

    // pics variables
    public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addProperty()
    {
        $query = "INSERT INTO " . $this->table_name . "(name, description, price, category_id, rooms, washrooms, area_size, state, town, address, color, brand, drive) VALUES (:name, :description, :price, :category_id, :rooms, :washrooms, :area_size, :state, :town, :address, :color, :brand, :drive)";

        $stmt = $this->conn->prepare($query); //prepare the query.

        // Clean the prepared data
        $this->name = htmlspecialchars((strip_tags($this->name)));
        $this->description = htmlspecialchars((strip_tags($this->description)));
        $this->price = htmlspecialchars((strip_tags($this->price)));
        $this->category_id = htmlspecialchars((strip_tags($this->category_id)));
        $this->rooms = htmlspecialchars((strip_tags($this->rooms)));
        $this->washrooms = htmlspecialchars((strip_tags($this->washrooms)));
        $this->area_size = htmlspecialchars((strip_tags($this->area_size)));
        $this->state = htmlspecialchars((strip_tags($this->state)));
        $this->town = htmlspecialchars((strip_tags($this->town)));
        $this->address = htmlspecialchars((strip_tags($this->address)));
        $this->color = htmlspecialchars((strip_tags($this->color)));
        $this->brand = htmlspecialchars((strip_tags($this->brand)));
        $this->drive = htmlspecialchars((strip_tags($this->drive)));

        // Clean the prepared data
        $stmt->bindparam(':name', $this->name);
        $stmt->bindparam(':description', $this->description);
        $stmt->bindparam(':price', $this->price);
        $stmt->bindparam(':category_id', $this->category_id);
        $stmt->bindparam(':rooms', $this->rooms);
        $stmt->bindparam(':washrooms', $this->washrooms);
        $stmt->bindparam(':area_size', $this->area_size);
        $stmt->bindparam(':state', $this->state);
        $stmt->bindparam(':town', $this->town);
        $stmt->bindparam(':address', $this->address);
        $stmt->bindparam(':color', $this->color);
        $stmt->bindparam(':brand', $this->brand);
        $stmt->bindparam(':drive', $this->drive);

        // Execute
        return $stmt->execute();
    }

    public function getAllProperties()
    {
        $query = "
            SELECT 
                properties.id, 
                properties.name, 
                properties.description, 
                properties.price, 
                properties.rooms, 
                properties.washrooms, 
                properties.area_size, 
                properties.state, 
                properties.town, 
                properties.address, 
                properties.color, 
                properties.brand, 
                properties.drive, 
                properties.create_at as create_at, 
                property_pics.img as image,
                categories.name as category 
            FROM 
                " . $this->table_name . " properties
            JOIN 
                categories ON properties.category_id = categories.id
            LEFT JOIN
                property_pics ON properties.id = property_pics.property_id
            WHERE
                property_pics.status = 'active'
            GROUP BY
                properties.id  
                
            ";

        $stmt = $this->conn->prepare($query); //prepare the query.
        $stmt->execute();

        echo $this->category_id;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPropertyById($id)
    {
        $query = "
            SELECT 
                properties.id, 
                properties.name, 
                properties.description, 
                properties.price, 
                properties.rooms, 
                properties.washrooms, 
                properties.area_size, 
                properties.state, 
                properties.town, 
                properties.address, 
                properties.color, 
                properties.brand, 
                properties.drive, 
                categories.name as category,
                IFNULL(property_pics.img, 'default.jpg') as image
            FROM 
                " . $this->table_name . " 
            JOIN 
                categories ON properties.category_id = categories.id
            LEFT JOIN
                property_pics ON properties.id = property_pics.property_id
            AND
                property_pics.status = 'active'
            WHERE 
                properties.id = :id";

        $stmt = $this->conn->prepare($query); //prepare the query.

        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProperty($id)
    {
        try {
            // Start a transaction
            $this->conn->beginTransaction();

            // First, get all image paths
            $getImagesQuery = "SELECT img FROM property_pics WHERE property_id = :property_id";
            $stmt = $this->conn->prepare($getImagesQuery);
            $stmt->bindParam(':property_id', $id);
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // Delete the physical image files
            foreach ($images as $imagePath) {
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $imagePath)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $imagePath);
                }
            }

            // Delete database records for images
            $deleteImagesQuery = "DELETE FROM property_pics WHERE property_id = :property_id";
            $stmt = $this->conn->prepare($deleteImagesQuery);
            $stmt->bindParam(':property_id', $id);
            $stmt->execute();

            // Delete the property
            $deletePropertyQuery = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($deletePropertyQuery);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // If we got here, commit the transaction
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            // If anything went wrong, roll back the transaction
            $this->conn->rollBack();
            error_log("Error deleting property: " . $e->getMessage());
            return false;
        }
    }

    public function updateProperty($id, $data, $newImages = null)
    {
        try {
            $this->conn->beginTransaction();

            // Update the main property data
            $query = "UPDATE " . $this->table_name . " 
                 SET name = :name, 
                     description = :description, 
                     price = :price, 
                     category_id = :category_id";

            // Add additional fields based on category
            if ($data['category_id'] == 1) { // Buildings
                $query .= ", rooms = :rooms, 
                        washrooms = :washrooms, 
                        area_size = :area_size,
                        state = :state,
                        town = :town,
                        address = :address";
            } elseif ($data['category_id'] == 2) { // Lands
                $query .= ", area_size = :area_size,
                        state = :state,
                        town = :town,
                        address = :address";
            } elseif ($data['category_id'] == 3) { // Cars
                $query .= ", color = :color,
                        brand = :brand,
                        drive = :drive";
            }

            $query .= " WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            // Clean and bind the data
            $cleanData = array();
            foreach ($data as $key => $value) {
                $cleanData[$key] = htmlspecialchars(strip_tags($value));
            }

            // Bind the basic parameters
            $stmt->bindParam(':name', $cleanData['name']);
            $stmt->bindParam(':description', $cleanData['description']);
            $stmt->bindParam(':price', $cleanData['price']);
            $stmt->bindParam(':category_id', $cleanData['category_id']);
            $stmt->bindParam(':id', $id);

            // Bind category-specific parameters
            if ($data['category_id'] == 1) { // Buildings
                $stmt->bindParam(':rooms', $cleanData['rooms']);
                $stmt->bindParam(':washrooms', $cleanData['washrooms']);
                $stmt->bindParam(':area_size', $cleanData['area_size']);
                $stmt->bindParam(':state', $cleanData['state']);
                $stmt->bindParam(':town', $cleanData['town']);
                $stmt->bindParam(':address', $cleanData['address']);
            } elseif ($data['category_id'] == 2) { // Lands
                $stmt->bindParam(':area_size', $cleanData['area_size']);
                $stmt->bindParam(':state', $cleanData['state']);
                $stmt->bindParam(':town', $cleanData['town']);
                $stmt->bindParam(':address', $cleanData['address']);
            } elseif ($data['category_id'] == 3) { // Cars
                $stmt->bindParam(':color', $cleanData['color']);
                $stmt->bindParam(':brand', $cleanData['brand']);
                $stmt->bindParam(':drive', $cleanData['drive']);
            }

            // Execute the property update
            $stmt->execute();

            // Handle image updates if new images are provided
            if ($newImages !== null && !empty($newImages['name'][0])) {
                // First, handle old images if needed (e.g., delete them)
                $oldImagesStmt = $this->conn->prepare("SELECT img FROM property_pics WHERE property_id = :property_id");
                $oldImagesStmt->bindParam(':property_id', $id);
                $oldImagesStmt->execute();
                $oldImages = $oldImagesStmt->fetchAll(PDO::FETCH_COLUMN);

                // Delete old images from filesystem and database
                foreach ($oldImages as $oldImage) {
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $oldImage)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $oldImage);
                    }
                }

                // Delete old image records from database
                $deleteOldImagesStmt = $this->conn->prepare("DELETE FROM property_pics WHERE property_id = :property_id");
                $deleteOldImagesStmt->bindParam(':property_id', $id);
                $deleteOldImagesStmt->execute();

                // Upload and save new images
                for ($i = 0; $i < count($newImages['name']); $i++) {
                    if ($newImages['error'][$i] === 0) {
                        $fileName = uniqid() . '_' . basename($newImages['name'][$i]);
                        $targetPath = 'uploads/' . $fileName;

                        if (move_uploaded_file($newImages['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/' . $targetPath)) {
                            // Save image record to database
                            $insertImageStmt = $this->conn->prepare("
                            INSERT INTO property_pics (property_id, img, status) 
                            VALUES (:property_id, :img, 'active')
                        ");
                            $insertImageStmt->bindParam(':property_id', $id);
                            $insertImageStmt->bindParam(':img', $targetPath);
                            $insertImageStmt->execute();
                        }
                    }
                }
            }

            // Commit the transaction if everything succeeded
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            // Roll back the transaction if anything failed
            $this->conn->rollBack();
            error_log("Error updating property: " . $e->getMessage());
            return false;
        }
    }

    public function getRecentProperties($limit = 3)
    {
        $query = "
            SELECT 
                properties.name, 
                properties.price, 
                IFNULL(property_pics.img, 'default.jpg') as image
            FROM 
                " . $this->table_name . "
            LEFT JOIN
                property_pics ON properties.id = property_pics.property_id
            AND
                property_pics.status = 'active'
            ORDER BY 
                create_at DESC LIMIT :limit
            
            
            ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add product pictures
    public function addPropertyPics($property_id, $image_path, $status = 'inactive')
    {
        $query = "INSERT INTO " . $this->pics_table . "(property_id, img, status) VALUE (:property_id, :img, :status)";

        // prepare
        $stmt = $this->conn->prepare($query);

        // Cleaning is optional

        // Bind the parameters
        $stmt->bindParam(':property_id', $property_id);
        $stmt->bindParam(':img', $image_path);
        $stmt->bindParam(':status', $status);

        // Execute
        return $stmt->execute();
    }

    // Method to upload image file and store in server
    public function uploadImage($file, $target_directory = 'uploads/')
    {
        $check = getimagesize($file['tmp_name']); //check the size of the image file
        if ($check !== false) {
            $target_file = $target_directory . basename($file['name']); //concatenate the target file to the target dir 
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //get the extension of the image

            // Determine the image file format to be allowed
            $allowed_types = ['jpeg', 'jpg', 'png', 'gif'];

            // Check if the gotten file extension is included in the array of allowed file types
            if (in_array($imageFileType, $allowed_types)) {
                # Check if the file exists
                if (!file_exists($target_file)) { // file_exists method returns true if the file doesn't exist
                    # Try to move the uploaded file to target directory
                    if (move_uploaded_file($file['tmp_name'], $target_file)) {
                        return $target_file;
                    } else {
                        return false; // Failed to upload
                    }
                } else {
                    return false; //File already exists
                }
            } else {
                return false; // Invalid file type
            }
        } else {
            return false; // Not an image   
        }
    }
}
