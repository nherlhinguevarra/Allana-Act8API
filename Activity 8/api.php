<?php
    header("Content-Type: application/json");

    $host = 'localhost';
    $db = 'hr';
    $user = 'root';
    $pass = ''; 
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Connection failed: ' . $e->getMessage()]);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $pdo->query("
            SELECT 
                a.userid, a.username, a.pass, a.email, 
                d.dname, s.totalsalary
            FROM 
                accounts a
            JOIN 
                department d ON a.dept_id = d.dnumber
            JOIN 
                deptsal s ON a.sal_id = s.dnumber
        ");
        $users = $stmt->fetchAll();
        echo json_encode($users);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($_GET['department']))) {
        $stmt = $pdo->query("SELECT dnumber, dname FROM department");
        $departments = $stmt->fetchAll();
        echo json_encode($departments);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($_GET['salary'])) && isset($_GET['dnumber'])) {
        $dnumber = intval($_GET['dnumber']);
        $stmt = $pdo->prepare("SELECT totalsalary FROM deptsal WHERE dnumber = ?");
        $stmt->execute([$dnumber]);
        $totalsalary = $stmt->fetch();
        echo json_encode($totalsalary);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        
        // Check if department exists
        $stmt = $pdo->prepare("SELECT dnumber FROM department WHERE dnumber = ?");
        $stmt->execute([$input['dept_id']]);
        $departmentExists = $stmt->fetch();
        
        if ($departmentExists) {
            $sql = "INSERT INTO accounts (username, pass, email, dept_id, sal_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$input['username'], $input['pass'], $input['email'], $input['dept_id'], $input['sal_id']]);
            echo json_encode(['message' => 'User added successfully']);
        } else {
            echo json_encode(['error' => 'Invalid department ID']);
        }
    }
?>