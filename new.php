<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foursdeath Shell - Powered by X'Boy Linux</title>
  <style>
    body {
      margin: 0;
      font-family: 'Courier New', monospace;
      background: url('https://g.top4top.io/p_1825r6iwh0.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      animation: cyber-glow 5s infinite alternate;
    }

    @keyframes cyber-glow {
      0% { filter: brightness(100%); }
      100% { filter: brightness(115%); }
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background-color: rgba(0,0,0,0.6);
      border-bottom: 1px solid #33f702;
    }

    header img {
      height: 60px;
    }

    .title {
      font-size: 1.2em;
      color: #33f702;
      text-shadow: 0 0 5px #fff;
    }

    .tool-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 20px 0;
      flex-wrap: wrap;
    }

    .tool-buttons button {
      background-color: #111;
      border: 1px solid #33f702;
      color: #33f702;
      padding: 10px 15px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .tool-buttons button:hover {
      background-color: #33f702;
      color: #000;
      text-shadow: 0 0 3px #fff;
    }

    .file-manager {
      width: 95%;
      max-width: 1200px;
      margin: 0 auto;
      background: rgba(0, 0, 0, 0.7);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px #33f702;
    }

    .file-manager table {
      width: 100%;
      border-collapse: collapse;
      color: #fff;
    }

    .file-manager th, .file-manager td {
      border: 1px solid #33f702;
      padding: 8px;
      text-align: center;
    }

    .file-manager th {
      background-color: #222;
    }

    footer {
      text-align: center;
      padding: 20px;
      color: #fff;
      font-size: 0.9em;
    }

    @media (max-width: 768px) {
      .tool-buttons {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="title">Foursdeath Team Shell<br><small>powered by X'Boy Linux</small></div>
    <img src="https://i.top4top.io/p_22457217t0.png" alt="Logo">
  </header>

  <div class="tool-buttons">
    <button onclick="alert('Upload tool')">Upload File</button>
    <button onclick="alert('Backdoor tool')">Backdoor</button>
    <button onclick="alert('Bypass tool')">Bypass</button>
    <button onclick="alert('Mass Deface')">Mass Deface</button>
    <button onclick="alert('Command Executor')">Cmd Exec</button>
    <button onclick="alert('Info Server')">Server Info</button>
  </div>

  <div class="file-manager">
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Size</th>
          <th>Permissions</th>
          <th>Modified</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example row -->
        <tr>
          <td>index.php</td>
          <td>4 KB</td>
          <td>rw-r--r--</td>
          <td>2025-06-16 20:30</td>
          <td>
            <button>Edit</button>
            <button>Rename</button>
            <button>Delete</button>
          </td>
        </tr>
        <!-- Dynamic rows inserted via PHP -->
      </tbody>
    </table>
  </div>

  <footer>
    &copy; 2025 Foursdeath Team | CyberShell by X'Boy Linux
  </footer>

  <script src="https://raw.githubusercontent.com/AliandiYoto/efek-salju-v.1/master/efeksalju1.js"></script>
  <audio src="https://b.top4top.io/m_17923krtx0.mp3" autoplay loop hidden></audio>
</body>
</html>
