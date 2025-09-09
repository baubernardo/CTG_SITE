<?php
// A lógica PHP para buscar os eventos continua a mesma
include 'partials/header.php'; // Adiciona o cabeçalho e menu

$json_data = file_get_contents('eventos.json');
$todos_eventos = json_decode($json_data, true);
if (!is_array($todos_eventos)) { $todos_eventos = []; }
$proximos_eventos = array_filter($todos_eventos, function($evento) {
    return isset($evento['data_evento']) && strtotime($evento['data_evento']) >= strtotime(date('Y-m-d'));
});
usort($proximos_eventos, function($a, $b) {
    return strtotime($a['data_evento']) <=> strtotime($b['data_evento']);
});
?>

<div class="container">
    <h1>Próximos Eventos</h1>
    <p>Fique por dentro da nossa agenda de fandangos, rodeios, jantares e muito mais!</p>
    <hr>
    <?php if (!empty($proximos_eventos)): ?>
        <?php foreach($proximos_eventos as $evento): ?>
            <div class="evento-item">
                <h3>
                    <a href="evento.php?id=<?php echo $evento['id']; ?>">
                        <?php echo htmlspecialchars($evento['titulo']); ?>
                    </a>
                </h3>
                <p>
                    <strong>Data:</strong> <?php echo date("d/m/Y", strtotime($evento['data_evento'])); ?>
                </p>
                <p>
                    <strong>Local:</strong> <?php echo htmlspecialchars($evento['local']); ?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum evento programado no momento.</p>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php'; // Adiciona o rodapé ?>