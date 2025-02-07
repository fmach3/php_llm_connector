<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input = $_POST["input"];
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);

  $headers = array();
  $headers[] = "Content-Type: application/json";
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $data = array(
    "prompt" => "Write something based on this prompt: " . $input,
    "max_tokens" => 100,
    "temperature" => 0.5,
  );
  $json = json_encode($data);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

  $response = curl_exec($ch);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);
  $result = json_decode($response, true);
  print_r ($result);
  echo "Response: " . $result['choices'][0]['text'];
//}
?>
