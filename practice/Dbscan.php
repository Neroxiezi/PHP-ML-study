<?php

use pf\arr\PFarr;
use Phpml\Clustering\DBSCAN;
use Phpml\Math\Distance\Chebyshev;
use Phpml\Math\Distance\Euclidean;
use Phpml\Math\Distance\Manhattan;
use Phpml\Math\Distance\Minkowski;

require './vendor/autoload.php';

/**
 * $epsilon - 两个样本之间的最大距离被认为在同一个识别区
 *  $minSamples - 要被视为核心点的点的邻域中的样本数（这包括点本身）
 *  $distanceMetric - 距离对象，默认欧几里德距离 (查看 distance documentation)
 */

//$samples = [[1, 1], [8, 7], [1, 2], [7, 8], [2, 1], [8, 9]];
$samples = [
    [116.389463, 39.87194],
    [116.389463, 39.874577],
    [116.312984, 39.887419],
    [116.382798, 39.853576],
    [116.496648, 39.872999],
    [116.436246, 39.911165],
    [116.622074, 40.061037],
    [116.599267, 40.062485],
    [116.441824, 39.940168],
    [116.599267, 40.062485],
    [116.402096, 39.942057],
    [116.37319, 39.93428],
    [116.327812, 39.899396],
    [116.374739, 39.898751],
    [116.287195, 39.959335],
    [116.513574, 39.878222],
    [116.474355, 39.962825],
    [116.400651, 40.008559]
];
$dbscan = new DBSCAN($epsilon = 0.1, $minSamples = 3, new Minkowski());
$data = $dbscan->cluster($samples);
PFarr::dd($data);
// return [0=>[[1, 1], ...], 1=>[[8, 7], ...]]