<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        "name" => $_POST["name"],
        "address" => $_POST["address"],
        "id" => $_POST["id"],
        "passport" => $_POST["passport"]
    );

    $json_data = json_encode($data);

    // Replace with your actual GAS Web App URL
    $url = "YOUR_GAS_WEB_APP_URL";

    $options = array(
        "http" => array(
            "header"  => "Content-type: application/json\r\n",
            "method"  => "POST",
            "content" => $json_data,
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Error submitting data.";
    } else {
        echo "Successfully submitted!";
    }
} else {
    echo "Invalid request.";
}
?>
