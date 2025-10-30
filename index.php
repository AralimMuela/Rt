
<?php  
include 'conexion.php';
$conexion = conectarBaseDatos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['comen'];
    $mensaje = $_POST['otrocom'];

    if (!empty($nombre) && !empty($mensaje)) {
        $sql = "INSERT INTO comentarios (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
        $conexion->query($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relaciones Tóxicas - Inicio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <div class="header-container">
      <a href="index.html" class="logo">
        <img src="logotntn.png" alt="logo">
      </a>
      <nav class="navbar">
        <a href="index.html">Inicio</a>
        <a href="detectar.html">¿Cómo Detectar?</a>
        <a href="como-salir.html">¿Cómo Salir?</a>
        <a href="recursos.html">Recursos</a>
        <a href="bibliografia.html">Descargos</a>
      </nav>
    </div>
  </header>

  <main class="article">
    <h1>Relaciones Tóxicas Normalizadas en Jóvenes</h1>

    <div class="intro">
      <p><strong>En la actualidad, las relaciones interpersonales cumplen un papel fundamental en el desarrollo de los jóvenes. Sin embargo, cada vez es más evidente la presencia de relaciones tóxicas que generan un impacto negativo en la vida de quienes las atraviesan.</strong></p>
    </div>

    <figure>
      <img src="toxicos.jpg" alt="Imagen sobre relaciones tóxicas">
    </figure>
    <p>El problema se agrava porque muchas de estas conductas se encuentran normalizadas por la sociedad y la cultura, lo que hace difícil identificarlas como dañinas. Actitudes como los celos excesivos, la manipulación emocional o la invasión de la privacidad suelen presentarse como “muestras de amor”, cuando en realidad representan señales de alerta.</p>
    <p>Actualmente esta problemática se ve agravada por la influencia de las redes sociales. Comúnmente los jóvenes consideran lo que ven a través de una pantalla como el estándar, llevándolos a anhelar relaciones con comportamientos que perpetúan ideales tóxicos. Es muy común encontrar en redes sociales como "TikTok", "Instagram", "Facebook", entre otras, videos o comentarios que normalizan los celos o la violencia en los vínculos afectivos.</p>
    <p>Primero hay que entender que cada relación se da en un contexto distinto. No podemos esperar que nuestras dinámicas se parezcan a las que vemos en videos con miles de likes. La popularidad de un contenido no garantiza que lo que muestra sea sano o correcto. A veces es fácil identificar situaciones tóxicas, pero otras veces no es tan evidente. Construir una relación sana con nuestra pareja no es algo que ocurra de un día para otro; es un proceso largo que requiere esfuerzo, poner límites, reconocer cuándo estamos lastimando al otro, y tener claro qué tipo de persona no queremos ser, y qué cosas no estamos dispuestos a aceptar en el trato hacia nosotros.</p>

    <h2>¿Qué es una relación tóxica?: definición</h2>
    <p>El término “pareja tóxica” fue utilizado por Liliam Glass en un libro publicado en 1995. En él se hablaba de parejas en las que no hay apoyo ni respeto, y en las que en los conflictos una de las partes busca quedar por encima de la otra.</p>
    <p>Por lo que una posible definición de relación tóxica sería: cualquier relación entre personas que no se apoyan mutuamente, en la que hay conflicto y uno intenta debilitar al otro, o ambos entre sí, en la que hay competencia, en la que hay falta de respeto. En resumen, una relación en la que te sientes sin apoyo, incomprendido, humillado o atacado. Se convierten en vínculos agotadores, hasta el punto en que los momentos negativos superan a los positivos y los problemas de pareja son constantes.</p>
    <p>Aunque en el ámbito más popular en el que se dan este tipo de relaciones sea en las parejas, es importante saber que las relaciones tóxicas pueden darse en cualquier terreno: laboral, amistoso e incluso familiar.</p>

    <figure>
      <img src="imgtoxicodef.webp" alt="Definición de relación tóxica">
    </figure>

    <div class="highlight">
      <h3>Recuerda:</h3>
      <p>Detectar estas dinámicas y comprender lo que implica una relación sana es fundamental para construir vínculos saludables basados en respeto, confianza y comunicación.</p>
    </div>

    <a href="detectar.html" class="button-link">→ Ir a Detectar</a>
  </main>

 <section class="comentarios">
    <h2>Comentarios de los Usuarios</h2>
    <p>Comparte tu experiencia o consejo para otros jóvenes:</p>

    <form id="comentarioForm" method="post" action="index.php">
      <input type="text" id="nombre" name="comen" placeholder="Tu nombre" required>
      <textarea id="mensaje" name="otrocom" placeholder="Escribe tu comentario..." required></textarea>
      <button type="submit">Enviar</button>
    </form>

    <div id="comentariosLista">
      <h3>Comentarios recientes:</h3>
      <?php
      $sqlMostrar = "SELECT nombre, mensaje, id FROM comentarios ORDER BY id DESC";
      $resultado = $conexion->query($sqlMostrar);

      if ($resultado && $resultado->num_rows > 0) {
          while ($fila = $resultado->fetch_assoc()) {
              echo "<div class='comentario'>";
              echo "<strong>" . htmlspecialchars($fila['nombre']) . "</strong><br>";
              echo "<p>" . htmlspecialchars($fila['mensaje']) . "</p>";
              echo "</div><hr>";
          }
      } else {
          echo "<p>Aún no hay comentarios. ¡Sé el primero en comentar!</p>";
      }

      $conexion->close();
      ?>
    </div>
  </section>
  <script src="comentarios.js"></script>
</body>
</html>
