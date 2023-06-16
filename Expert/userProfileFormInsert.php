<?php
session_start();

$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

$userID = $_REQUEST["userID"];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $researchAreaName = $_REQUEST['researchAreaName'];
    $academicStatus = $_REQUEST['academicStatus_type'];
    $instagramUsername = $_REQUEST['instagram_userName'];
    $linkedinUsername = $_REQUEST['linkedin_userName'];
    $email = $_REQUEST['email'];

    // Insert research area into research_area table
    $queryResearch = "INSERT INTO research_area (researchAreaName) VALUES ('$researchAreaName')";
    mysqli_query($link, $queryResearch);
    $researchAreaID = mysqli_insert_id($link);

    // Insert research area and user IDs into research_areauserexpert table
    $queryResearchID = "INSERT INTO research_areauserexpert (researchArea_ID, user_ID) VALUES ('$researchAreaID', '$userID')";
    mysqli_query($link, $queryResearchID);

    // Insert academic status into academic_status table and user IDs into academic_statususerexpert table
    foreach ($academicStatus as $status) {
        $queryAcademicStatusType = "INSERT INTO academic_status (academicStatus_type) VALUES ('$status')";
        mysqli_query($link, $queryAcademicStatusType);
        $academicStatusID = mysqli_insert_id($link);

        $queryAcademicExpert = "INSERT INTO academic_statususerexpert (user_ID, academicStatus_ID) VALUES ('$userID', '$academicStatusID')";
        mysqli_query($link, $queryAcademicExpert);
    }

    // Insert instagram and linkedin usernames into social_media table
    $querySocialMedia = "INSERT INTO socialmedia (user_ID, instagram_userName, linkedin_userName) VALUES ('$userID', '$instagramUsername', '$linkedinUsername')";
    mysqli_query($link, $querySocialMedia);

    // Update email in the user table
    $queryUpdateUserEmail = "UPDATE user SET user_email = '$email' WHERE user_ID = '$userID'";
    mysqli_query($link, $queryUpdateUserEmail);

    // Close the database connection
    mysqli_close($link);

    $alert_message = "Information Details have been inserted";
    echo "<script>alert('$alert_message');</script>";
    echo "<script type='text/javascript'>window.location='userProfile.php';</script>";
}
?>
