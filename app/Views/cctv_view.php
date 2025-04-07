<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live CCTV Feed</title>
    <style>
        header, footer {
            width: 100%;
            background: #fff;
            padding: 15px 0;
            text-align: center;
            position: relative;
            z-index: 10;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            justify-content: center;
        }
        .cctv-box {
            background: #ddd;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: pointer; /* Make it clear that it's clickable */
        }
        .cctv-box img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .cctv-box .label {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 5px;
            text-align: center;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 8px 15px;
            margin: 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .pagination button:hover {
            background: #45a049;
        }
        iframe {
            width: 80%;
            height: 500px;
            border: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Semua CCTV</h1>
        <iframe id="cctv-frame" src="http://77.132.160.126/axis-cgi/mjpg/video.cgi" allowfullscreen></iframe>
        <div class="grid" id="cctv-grid">
            <div class="cctv-box" onclick="switchCamera(0)"><img src="offline-placeholder.png" alt="CCTV Offline"><div class="label">Camera 1</div></div>
            <div class="cctv-box" onclick="switchCamera(1)"><img src="offline-placeholder.png" alt="CCTV Offline"><div class="label">Camera 2</div></div>
            <div class="cctv-box" onclick="switchCamera(2)"><img src="offline-placeholder.png" alt="CCTV Offline"><div class="label">Camera 3</div></div>
            <div class="cctv-box" onclick="switchCamera(3)"><img src="offline-placeholder.png" alt="CCTV Offline"><div class="label">Camera 4</div></div>
        </div>
    </div>
    <script>
        let streams = [
            'http://24.134.3.9/axis-cgi/mjpg/video.cgi',
            'http://213.3.30.80:6001/axis-cgi/mjpg/video.cgi',
            'http://220.157.230.36/nphMotionJpeg?Resolution=640x480',
            'http://80.254.191.189:8008/axis-cgi/mjpg/video.cgi'
        ];
        
        function switchCamera(index) {
            document.getElementById('cctv-frame').src = streams[index];
        }
    </script>
</body>
</html>
