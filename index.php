<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>SAQR</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <style>
    
    body { margin:0; font-family: Arial,'Roboto',sans-serif; background:#fafafa; }
    nav { background-color: #006d5b; padding: 12px 0; }
    nav ul { list-style:none; margin:0; padding:0; display:flex; justify-content:center; gap:40px; }
    nav ul li a { color:white; text-decoration:none; font-weight:500; padding-bottom:5px; cursor:pointer; }
    nav ul li a.active { border-bottom:2px solid white; }
    .section { display:none; padding:30px 20px; }
    .section.active { display:block; }
    /* Inicio */
    .logo { text-align:center; margin:50px 0 30px 0; }
    .logo img { width:60px; display:block; margin:0 auto; }
    .logo h1 { margin:12px 0 0 0; color:#006d5b; font-size:24px; }
    .btn-container { display:flex; flex-direction:column; align-items:center; gap:18px; margin-top:10px; }
    .btn-container button { background:white; border:1.5px solid #006d5b; border-radius:20px; padding:12px 30px; font-size:16px; cursor:pointer; transition:.3s; width:250px; }
    .btn-container button:hover { background:#006d5b; color:white; }
    /* Formularios */
    .container { display:flex; justify-content:center; align-items:center; min-height:80vh; flex-direction:column; }
    .form-box, .login-box { background:#fff; padding:28px 26px 20px 26px; border-radius:8px; box-shadow:0 2px 12px rgba(0,0,0,0.07); min-width:320px; max-width:350px; width:100%; display:flex; flex-direction:column; gap:10px; }
    .form-box h2 { text-align:center; color:#006d5b; margin-bottom:18px; }
    .form-box input, .login-box input, .form-box select { padding:8px 10px; font-size:1em; border:1px solid #ccc; border-radius:5px; outline:none; background:#f9f9f9; margin-bottom:10px; transition:border .2s; }
    .form-box input:focus, .login-box input:focus, .form-box select:focus { border-color:#006d5b; }
    .form-box button, .login-box button, .btn { width:100%; padding:10px 0; background:#222; color:#fff; border:none; border-radius:5px; font-size:1em; font-weight:600; cursor:pointer; margin-top:5px; transition:background .2s; }
    .form-box button:hover, .login-box button:hover, .btn:hover { background:#006d5b; }
    /* Escaneo QR */
    .qr-img { width:120px; height:120px; margin-bottom:25px; }
    .btn-info { background:white; border:1.5px solid #006d5b; border-radius:20px; padding:12px 30px; font-size:16px; cursor:pointer; transition:0.3s; width:220px; margin-top:8px; }
    .btn-info:hover { background:#006d5b; color:white; }
    /* Perfil usuario */
    .perfil-label { display:block; font-size:1.1em; color:#222; margin-bottom:18px; }
    /* Tabla */
    table { border-collapse:collapse; width:700px; background:#fff; border-radius:7px; box-shadow:0 2px 12px rgba(0,0,0,0.09); overflow:hidden; margin-top:20px; }
    th, td { border:1px solid #bbb; padding:9px 12px; text-align:left; font-size:1em; }
    th { background:#f1f1f1; font-weight:700; }
    tr:nth-child(even) td { background:#fafafa; }
    h2 { margin-top:40px; color:#006d5b; text-align:center; }
  </style>
</head>
<body>

<header>
  <nav>
  <ul>
   <li><a href="#inicio" onclick="showSection('inicio')">Inicio</a></li>
   <li><a href="#login" onclick="showSection('login')">Acceder</a></li>
<li><a href="#qr" onclick="showSection('qr')">Escaneo QR</a></li>
<li><a href="#perfil" onclick="showSection('perfil')">Perfil</a></li>
   
  </ul>
</nav>
</header>


<!-- Inicio -->
<section id="inicio" class="section active">
  <div class="logo">
    <img src="Qr.png" alt="Logo QR">
    <h1>SAQR</h1>
  </div>
  <div class="btn-container">
  <button onclick="showSection('login')">Iniciar sesión</button>
  <button onclick="showSection('registro')">Registrarse</button>
  <button onclick="showSection('admin')">Acceder como administrador</button>
</div>

</section>

<!-- Acceder -->
<!-- Login Usuario -->
<section id="login" class="section">
  <div class="container">
    <form class="login-box" action="login.php" method="POST">
      <input type="email" name="correo" placeholder="Correo" required>
      <input type="password" name="clave" placeholder="Contraseña" required>
      <button type="submit">Iniciar sesión</button>
    </form>
  </div>
</section>


<!-- Acceder -->
<!-- Admin -->
<section id="admin" class="section">
  <div class="container">
    <form class="form-box" action="admin_login.php" method="POST">
      <h2>Acceder como Administrador</h2>
      <input type="email" name="correo" placeholder="Correo" required>
      <input type="password" name="clave" placeholder="Contraseña" required>
      <button type="submit">Acceder</button>
    </form>
  </div>
</section>

<!-- Acceder -->
<!-- Registro -->
<section id="registro" class="section">
  <div class="container">
    <form class="form-box" action="registro.php" method="POST">
      <input type="text" name="nombres" placeholder="Nombres" required>
      <input type="text" name="apellidos" placeholder="Apellidos" required>
      <input type="email" name="correo" placeholder="Correo" required>
      <input type="text" name="programa" placeholder="Programa" required>

      <select name="tipo_documento" required>
        <option value="">Tipo de Documento</option>
        <option value="CC">CC</option>
        <option value="TI">TI</option>
        <option value="CE">CE</option>
      </select>

      <input type="text" name="numero_documento" placeholder="Número Documento" required>
      <input type="text" name="ficha" placeholder="Ficha" required>
      <input type="password" name="clave" placeholder="Contraseña" required>

      <input type="hidden" name="rol" value="usuario">
      <button type="submit">Registrarse</button>
    </form>
  </div>
</section>


<!-- Escaneo QR -->
<section id="qr" class="section">
  <div class="container">
    <img src="https://play-lh.googleusercontent.com/Byl6BHzEv7tWDGa5QUgztneq8C8TGYelu8ywVMTTRUH2e9keboyLqL4YhmzaU3vjgA" alt="QR" class="qr-img">
    <button class="btn-info">Ver mi información</button>
  </div>
</section>

<!-- Perfil Usuario -->
<section id="perfil" class="section">
  <div class="container">
    <span class="perfil-label">Nombre:</span>
    <span class="perfil-label">Apellido:</span>
    <span class="perfil-label">Programa académico:</span>
    <span class="perfil-label">Tipo de identificación:</span>
    <span class="perfil-label">Número Identificación:</span>
  </div>
</section>

<!-- Tabla General -->
<section id="tabla" class="section">
  <h2>Tabla General</h2>
  <div class="container">
    <?php
    if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
        include("conexion.php");
        $sql = "SELECT nombres, apellidos, correo, programa, tipo_documento, numero_documento, ficha FROM usuarios";
        $result = $conn->query($sql);

        echo '<table>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Correo</th>
                  <th>Programa</th>
                  <th>Tipo Documento</th>
                  <th>Número Documento</th>
                  <th>Ficha</th>
                </tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nombres']}</td>
                        <td>{$row['apellidos']}</td>
                        <td>{$row['correo']}</td>
                        <td>{$row['programa']}</td>
                        <td>{$row['tipo_documento']}</td>
                        <td>{$row['numero_documento']}</td>
                        <td>{$row['ficha']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay registros</td></tr>";
        }
        echo "</table>";

        $conn->close();
    } else {
        echo "<p style='color:red; font-weight:bold; text-align:center;'>🚫 Acceso restringido. Solo el administrador puede ver esta sección.</p>";
    }
    ?>
  </div>
</section>





<script>
function showSection(id){
  document.querySelectorAll('.section').forEach(sec => sec.classList.remove('active'));
  document.getElementById(id).classList.add('active');
  document.querySelectorAll('nav ul li a').forEach(a => a.classList.remove('active'));

  const linkMap = {
    'inicio': 0,   // primer enlace
    'login': 1,    // segundo enlace "Acceder"
    'registro': 1, // segundo enlace "Acceder" también
    'admin': 1,    // segundo enlace "Acceder" también
    'qr': 2,       // tercero enlace
    'perfil': 3,   // cuarto enlace
    'tabla': 4,    // quinto enlace
  };

  const links = document.querySelectorAll('nav ul li a');
  if(linkMap.hasOwnProperty(id)){
    links[linkMap[id]].classList.add('active');
  }
}


const params = new URLSearchParams(window.location.search);
const section = params.get("section");
if (section) {
  showSection(section);
}
</script>


</body>
</html>
