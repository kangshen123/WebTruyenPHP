<?php
// Hàm generateRandomNumbers: Tạo tên ngẫu nhiên cho file
function generateRandomNumbers() {
    return rand(1000, 9999); // Tạo một số ngẫu nhiên từ 1000 đến 9999
}

// Xử lý tải file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Thư mục lưu file
    $uploadDir = "images/PicTruyen";

    // Kiểm tra và tạo thư mục nếu chưa tồn tại
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Tạo thư mục với quyền 777
    }

    // Kiểm tra file được tải lên
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];
        
        // Lấy thông tin file
        $fileName = $file['name']; // Tên gốc của file
        $fileTmpPath = $file['tmp_name']; // Đường dẫn file tạm thời
        $fileType = mime_content_type($fileTmpPath); // Loại MIME
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Phần mở rộng file

        // MIME types được chấp nhận
        $allowedMimeTypes = ["image/jpg", "image/jpeg", "image/png", "image/webp"];
        $allowedExtensions = ["jpg", "jpeg", "png", "webp"];

        // Kiểm tra MIME type và phần mở rộng
        if (in_array($fileType, $allowedMimeTypes) && in_array($fileExtension, $allowedExtensions)) {
            // Tạo tên file mới với số ngẫu nhiên
            $randomNumber = generateRandomNumbers();
            $newFileName = $randomNumber . "." . $fileExtension;

            // Đường dẫn đầy đủ để lưu file
            $destPath = $uploadDir . $newFileName;

            // Di chuyển file từ thư mục tạm vào thư mục đích
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Tạo URL công khai cho file
                $fileUrl = "http://localhost/" . $destPath;

                // Phản hồi thành công
                echo json_encode([
                    "status" => "success",
                    "message" => "File uploaded successfully",
                    "file_url" => $fileUrl
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Failed to move uploaded file"
                ]);
            }
        } else {
            // File không hợp lệ
            echo json_encode([
                "status" => "error",
                "message" => "Invalid file type. Only JPG, PNG, and WEBP files are allowed."
            ]);
        }
    } else {
        // Lỗi tải file
        echo json_encode([
            "status" => "error",
            "message" => "No file uploaded or upload error occurred."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method. Please use POST."
    ]);
}
?>


<?php
//part 2
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "your_database_name");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hàm tạo tên file ngẫu nhiên
function generateRandomNumbers() {
    return rand(1000, 9999); // Tạo số ngẫu nhiên từ 1000 đến 9999
}

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu
    $imageUrl = ""; // Đường dẫn ảnh (nếu có)

    // Xử lý upload file ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "uploads/images/"; // Thư mục lưu trữ
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa tồn tại
        }

        $file = $_FILES['image'];
        $fileTmpPath = $file['tmp_name'];
        $fileType = mime_content_type($fileTmpPath);
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        $allowedMimeTypes = ["image/jpg", "image/jpeg", "image/png", "image/webp"];
        $allowedExtensions = ["jpg", "jpeg", "png", "webp"];

        if (in_array($fileType, $allowedMimeTypes) && in_array($fileExtension, $allowedExtensions)) {
            $randomFileName = generateRandomNumbers() . "." . $fileExtension; // Tạo tên file ngẫu nhiên
            $destPath = $uploadDir . $randomFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $imageUrl = $destPath; // Lưu đường dẫn file
            } else {
                die("Error: Failed to move uploaded file.");
            }
        } else {
            die("Error: Invalid image type.");
        }
    }

    // Thêm tài khoản vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO accounts (username, email, password, profile_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $imageUrl);

    if ($stmt->execute()) {
        echo "Account added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
