Usages

use App\Challenge242\TvShows;

$movies = new TvShows();

//Get the number of recorded videos
$movies->setMovieTimes(1530, 1600);
$movies->setMovieTimes(1605, 1630);
$movies->setMovieTimes(1305, 1430);
$movies->showMovies();
echo $movies->countRecordedMovies();


//Get the names of recorded videos

$movies->setMovieTimes(1535, 1610, 'Pokémon');
$movies->setMovieTimes(1610, 1705, 'Law & Order');
$movies->setMovieTimes(1615, 1635, 'ER');
$movies->setMovieTimes(1615, 1635, 'Ellen');
$movies->setMovieTimes(1615, 1705, 'Family Matters');
$movies->setMovieTimes(1725, 1810, 'The Fresh Prince of Bel-Air');
$movies->showMovies();
echo $movies->getRecordedMovies();