<?php

namespace XBMCMock\Controller;

use XBMCMock\Model;

/**
 * Handles "fetching" of movies
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
class Movie
{

	/**
	 * Returns a list of movies
	 * @return array
	 */
	public function getMovies()
	{
		return array(
			new Model\Movie(array(
				'genre'=>array('Documentary'),
				'label'=>'1',
				'movieid'=>1086,
				'rating'=>7.5,
				'runtime'=>0,
				'thumbnail'=>'image://http%3a%2f%2fimage.tmdb.org%2ft%2fp%2foriginal%2fe2B8e7GVYoYzynTW9Y0y0sWCrkm.jpg/',
				'year'=>2013,
			)),
			new Model\Movie(array(
				'genre'=>array('Drama'),
				'label'=>'Awakenings',
				'movieid'=>86,
				'rating'=>7.5999999046326,
				'runtime'=>7260,
				'thumbnail'=>'image://http%3a%2f%2fcf2.imgobject.com%2ft%2fp%2foriginal%2f6vkJhhd9h9QxMGHYQjVY1fY5XSI.jpg/',
				'year'=>1990,
			)),
			new Model\Movie(array(
				'genre'=>array('Action', 'Adventure', 'Drama', 'Romance', 'Foreign'),
				'label'=>'Arn - Tempelriddaren',
				'movieid'=>81,
				'rating'=>6.5,
				'runtime'=>8340,
				'thumbnail'=>'',
				'year'=>2007,
			)),
		);
	}

}
