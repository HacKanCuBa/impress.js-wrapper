<?php
/* vim: set tabstop=8 softtabstop=0 smarttab shiftwidth=4 expandtab fenc=utf-8 ff=unix : */

/*****************************************************************************
 *  This file is part of impressjs_php_wrapper
 *  Copyright (C) 2016 HacKan (@hackancuba)
 *
 *  This is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *****************************************************************************/

namespace HacKan\ImpressJSWrapper;

/**
 * Wrapper class to make easier to work with impress.js library.
 * Requires PHP v5.3+
 * @author HacKan (@hackancuba)
 * @license GPL-3.0+ http://www.gnu.org/licenses/gpl-3.0-standalone.html
 * @version 1.1.2
 */
class Impress
{
    /**
     * @var integer $x Coordinate X
     */
    protected $x;

    /**
     * @var integer $y Coordinate Y
     */
    protected $y;

    /**
     * @var integer $z Coordinate Z
     */
    protected $z;

    /**
     * @var integer $alpha Angle Alpha of axis X
     */
    protected $alpha;

    /**
     * @var integer $theta Angle Theta of axis Y
     */
    protected $theta;

    /**
     * @var integer $phi Angle Phi of axis Z
     */
    protected $phi;

    /**
     * @var integer $overview_x Overview position coordinate X
     */
    protected $overview_x;

    /**
     * @var integer $overview_y Overview position coordinate Y
     */
    protected $overview_y;

    /**
     * @var integer $overview_s Overview Scale
     */
    protected $overview_s;

    function __construct()
    {
        $this->reset();
    }

    /**
     * Sets the Overview coordinates and scale. Values can be negative.
     *
     * @param array|integer $overview
     * An array of coordinates such as
     * [ "x" => 1, "y" => 2, "s" => 3] or [1, 2, 3]
     * Note that S is the Scale.
     * It's not necessary to set all three elements.
     * Elements not set will be omitted, keeping it's current value!.
     * It can also be an integer, and if so, it will be considered for
     * X only.
     */
    public function setOverview($overview)
    {
        if (is_array($overview)) {
            $this->overview_x =
                array_key_exists("x", $overview)
                    ? (int) $overview["x"]
                    : (array_key_exists(0, $overview)
                            ? (int) $overview[0]
                            : $this->overview_x
                    );

            $this->overview_y =
                array_key_exists("y", $overview)
                    ? (int) $overview["y"]
                    : (array_key_exists(1, $overview)
                            ? (int) $overview[1]
                            : $this->overview_y
                    );

            $this->overview_s =
                array_key_exists("s", $overview)
                    ? (int) $overview["s"]
                    : (array_key_exists(2, $overview)
                            ? (int) $overview[2]
                            : $this->overview_s
                    );
        } elseif (is_numeric($overview)) {
            $this->overview_x = (int) $overview;
        }
    }

    /**
     * This method calculates the overview coordinates based on the
     * currently set coords, asuming these are the final ones, and that
     * the first ones are [0,0]
     * @todo Automatically calculate scale
     */
    public function autosetOverview()
    {
        $this->overview_x = (int) ($this->x / 2);
        $this->overview_y = (int) ($this->y / 2);
        // ToDo:
        // how can I calculate scale? I think it can be done w/ the
        // screen resolution
    }

    /**
     * Sets the coordinates to a given value. Values can be negative.
     *
     * @param array|integer $coord [optional]
     * An array of coordinates such as
     * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * Elements not set will be omitted, keeping it's current value!.
     * It can also be an integer, and if so, it will be considered for
     * X only.
     */
    public function setCoord($coord)
    {
        if (is_array($coord)) {
            $this->x =
                array_key_exists("x", $coord)
                    ? (int) $coord["x"]
                    : (array_key_exists(0, $coord)
                            ? (int) $coord[0]
                            : $this->x
                    );

            $this->y =
                array_key_exists("y", $coord)
                    ? (int) $coord["y"]
                    : (array_key_exists(1, $coord)
                            ? (int) $coord[1]
                            : $this->y
                    );

            $this->z =
                array_key_exists("z", $coord)
                    ? (int) $coord["z"]
                    : (array_key_exists(2, $coord)
                            ?(int)  $coord[2]
                            : $this->z
                    );
        } elseif (is_numeric($coord)) {
            $this->x = (int) $coord;
        }
    }

    /**
     * Sets the angles to a given value. Values can be negative.
     *
     * @param array|integer $angle [optional]
     * An array of angles such as
     * [ "alpha" => 1, "theta" => 2, "phi" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * Elements not set will be omitted, keeping it's current value!.
     * It can also be an integer, and if so, it will be considered for
     * Alpha only.
     */
    public function setAngle($angle)
    {
        if (is_array($angle)) {
            $this->alpha =
                array_key_exists("alpha", $angle)
                    ? (int) $angle["alpha"]
                    : (array_key_exists(0, $angle)
                            ? (int) $angle[0]
                            : $this->alpha
                    );

            $this->theta =
                array_key_exists("theta", $angle)
                    ? (int) $angle["theta"]
                    : (array_key_exists(1, $angle)
                            ? (int) $angle[1]
                            : $this->theta
                    );

            $this->phi =
                array_key_exists("phi", $angle)
                    ? (int) $angle["phi"]
                    : (array_key_exists(2, $angle)
                            ? (int) $angle[2]
                            : $this->phi
                    );
        } elseif (is_numeric($angle)) {
            $this->alpha = (int) $angle;
        }
    }

    /**
     * Sets the coordinates and angles to a given value. Values can
     * be negative.
     *
     * @param array|integer $coord [optional]
     * An array of coordinates such as
     * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * Elements not set will be omitted, keeping it's current value!.
     * It can also be an integer, and if so, it will be considered for X only.
     *
     * @param array|integer $angle [optional]
     * An array of angles such as
     * [ "alpha" => 1, "theta" => 2, "phi" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * Elements not set will be omitted, keeping it's current value!.
     * It can also be an integer, and if so, it will be considered for
     * Alpha only.
     *
     * @param array|integer $overview
     * An array of coordinates such as
     * [ "x" => 1, "y" => 2, "s" => 3] or [1, 2, 3]
     * Note that S is the Scale.
     * It's not necessary to set all three elements.
     * Elements not set will be omitted, keeping it's current value!.
     * It can also be an integer, and if so, it will be considered for
     * X only.
     */
    public function set($coord = null, $angle = null, $overview = null)
    {
        $this->setCoord($coord);
        $this->setAngle($angle);
        $this->setOverview($overview);
    }

    /**
     * Sets coords X, Y, Z to 0.
     */
    public function resetCoord()
    {
        $this->setCoord([0, 0, 0]);
    }

    /**
     * Sets angles Alpha, Theta, Phi to 0.
     */
    public function resetAngle()
    {
        $this->setAngle([0, 0, 0]);
    }

    /**
     * Sets overview to [0, 0, 0].
     */
    private function resetOverview()
    {
        $this->setOverview([0, 0, 0]);
    }

    /**
     * Sets coords, angles and overview to 0.
     */
    public function reset()
    {
        $this->resetCoord();
        $this->resetAngle();
        $this->resetOverview();
    }

    /**
     * Get the coordinates.
     *
     * @param boolean $assoc Set to TRUE to return values as an associative
     * array, FALSE (default) as numerically indexed array.
     * @return array An array of coordinates
     */
    public function getCoord($assoc = false)
    {
        return (
            $assoc
                ? ['x' => $this->x, 'y' => $this->y, 'z' => $this->z]
                : [$this->x, $this->y, $this->z]
        );
    }

    /**
     * Get the angles.
     *
     * @param boolean $assoc Set to TRUE to return values as an associative
     * array, FALSE (default) as numerically indexed array
     * @return array An array of angles
     */
    public function getAngle($assoc = false)
    {
        return (
            $assoc
                ? ['alpha' => $this->alpha, 'theta' => $this->theta, 'phi' => $this->phi]
                : [$this->alpha, $this->theta, $this->phi]
        );
    }

    /**
     * Get the overview params.
     *
     * @param boolean $assoc Set to TRUE to return values as an associative
     * array, FALSE (default) as numerically indexed array
     * @return array An array of overview params
     */
    public function getOverview($assoc = false)
    {
        return (
            $assoc
                ? ['x' => $this->overview_x, 'y' => $this->overview_y, 's' => $this->overview_s]
                : [$this->overview_x, $this->overview_y, $this->overview_s]
        );
    }

    /**
     * Moves the coordinates adding them to a given value.  Values can
     * be negative, and thus it would substract them from the current ones.
     *
     * @param array|integer $delta An array of coordinates such as
     * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * It can also be an integer, and if so, it will be considered for
     * X only.
     */
    public function moveCoord($delta)
    {
        if (is_array($delta)) {
            $this->x +=
                array_key_exists("x", $delta)
                    ? (int) $delta["x"]
                    : (array_key_exists(0, $delta)
                            ? (int) $delta[0]
                            : 0
                    );

            $this->y +=
                array_key_exists("y", $delta)
                    ? (int) $delta["y"]
                    : (array_key_exists(1, $delta)
                            ? (int) $delta[1]
                            : 0
                    );

            $this->z +=
                array_key_exists("z", $delta)
                    ? (int) $delta["z"]
                    : (array_key_exists(2, $delta)
                            ? (int) $delta[2]
                            : 0
                    );
        } elseif (is_numeric($delta)) {
            $this->x += (int) $delta;
        }
    }

    /**
     * Moves the angles adding them to a given value.  Values can
     * be negative, and thus it would substract them from the current ones.
     *
     * @param array|integer $delta An array of angles such as
     * [ "alpha" => 1, "theta" => 2, "" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * It can also be an integer, and if so, it will be considered for
     * Alpha only.
     */
    public function moveAngle($delta)
    {
        if (is_array($delta)) {
            $this->alpha +=
                array_key_exists("alpha", $delta)
                    ? (int) $delta["alpha"]
                    : (array_key_exists(0, $delta)
                            ? (int) $delta[0]
                            : 0
                    );

            $this->theta +=
                array_key_exists("theta", $delta)
                    ? (int) $delta["theta"]
                    : (array_key_exists(1, $delta)
                            ? (int) $delta[1]
                            : 0
                    );

            $this->phi +=
                array_key_exists("phi", $delta)
                    ? (int) $delta["phi"]
                    : (array_key_exists(2, $delta)
                            ? (int) $delta[2]
                            : 0
                    );
        } elseif (is_numeric($delta)) {
            $this->alpha += (int) $delta;
        }
    }
    
    /**
     * Moves the coords and angles adding them to a given value.  Values can
     * be negative, and thus it would substract them from the current ones.
     *
     * @param array|integer $delta_coord An array of coordinates such as
     * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * It can also be an integer, and if so, it will be considered for
     * X only.
     * @param array|integer $delta_angle An array of angles such as
     * [ "alpha" => 1, "theta" => 2, "" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * It can also be an integer, and if so, it will be considered for
     * Alpha only.
     */
    public function move($delta_coord, $delta_angle)
    {
        $this->moveCoord($delta_coord);
        $this->moveAngle($delta_angle);
    }

    /**
     * Prints the required text for a whole overview slide
     * for impress.js
     */
    public function printSlideOverview()
    {
        echo
            '<div id="overview" class="step" ',
            'data-x="', $this->overview_x, '" ',
            'data-y="', $this->overview_y, '" ',
            'data-scale="', $this->overview_s, '"',
            '></div>', PHP_EOL;
    }

    /**
     * Prints only the required text to set the coordinates and angles
     * for impress.js
     * To print the whole slide div, see print_slide_div().
     * @see print_slide_div()
     */
    public function printData()
    {
        echo
            'data-x="', $this->x, '" ',
            'data-y="', $this->y, '" ',
            'data-z="', $this->z, '" ',
            'data-rotate-x="', $this->alpha, '" ',
            'data-rotate-y="', $this->theta, '" ',
            'data-rotate-z="', $this->phi, '" ';
    }

    /**
     * Prints the required text to begin a new slide for impress.js
     *
     * @param string $class [optional]
     * Classes as a space-separated list (it's printed as-is)
     * @param string $id [optional]
     * Slide id (it's printed as-is)
     * @param integer $scale [optional]
     * Scale of the slide, should be >= 1.
     */
    public function printSlideDiv($class = 'step', $id = '', $scale = 1)
    {
        echo
            '<div ',
            (empty($id) ? '' : 'id="' . $id . '" '),
            (empty($class) ? '' :'class="' . $class . '" ' );
            $this->printData();
            echo (empty((int) $scale) ? '' : 'data-scale="' . (int) $scale . '" ' ),
            '>', PHP_EOL;
    }

    /**
     * Combination of calling: move_coord(), move_angle() and
     * print_data().
     *
     * @param array|integer $delta_coord [optional]
     * @param array|integer $delta_angle an array of angles such as
     * [ "alpha" => 1, "theta" => 2, "" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * It can also be an integer, and if so, it will be considered for
     * Alpha only.
     */
    public function moveThenPrintData(
        $delta_coord = null,
        $delta_angle = null
    ) {
        $this->moveCoord($delta_coord);
        $this->moveAngle($delta_angle);
        $this->printData();
    }

    /**
     * Combination of calling: move_coord(), move_angle() and
     * print_slide_div().
     *
     * @param array|integer $delta_coord [optional]
     * An array of coordinates such as
     * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * It can also be an integer, and if so, it will be considered for
     * X only.
     * @param array|integer $delta_angle [optional]
     * An array of angles such as
     * [ "alpha" => 1, "theta" => 2, "" => 3] or [1, 2, 3]
     * It's not necessary to set all three elements.
     * It can also be an integer, and if so, it will be considered for
     * Alpha only.
     * @param string $class [optional]
     * Classes as a space-separated list (it's printed as-is)
     * @param string $id [optional]
     * Slide id (it's printed as-is)
     * @param integer $scale [optional]
     * Scale of the slide, should be >= 1.
     */
    public function moveThenPrintSlideDiv(
        $delta_coord = null,
        $delta_angle = null,
        $class = 'step',
        $id = '',
        $scale = 1
    ) {
        $this->moveCoord($delta_coord);
        $this->moveAngle($delta_angle);
        $this->printSlideDiv($class, $id, $scale);
    }

    /**
     * Echoes the passed string as the fallback message block.
     * @param array $fallback_message Message to echo (it's printed as-is)
     */
    public function echoFallbackMessage($fallback_message)
    {
        echo
            '<div class="fallback-message">', PHP_EOL,
            $fallback_message, PHP_EOL,
            '</div>';
    }
}
