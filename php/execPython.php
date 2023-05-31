<?php
// Chemin vers le script Python
$pythonScript = '../py/MeteoDataLogger.py';

// Exécution du script Python
$output = shell_exec('python ' . $pythonScript);

// Affichage du résultat
echo $output;