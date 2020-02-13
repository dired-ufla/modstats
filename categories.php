<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * Report main page
 *
 * @package    report
 * @copyright  2020 Paulo Jr
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once $CFG->libdir . '/formslib.php';

class categories_form extends moodleform {
    public function definition() {
        global $DB;

        $mform = $this->_form; // Don't forget the underscore! 

        $categories = $DB->get_records('course_categories', null, 'name');
        $cat_names = array();

        $cat_names[ALL_CATEGORIES] = get_string('lb_all_categories', 'report_modstats');

        foreach ($categories as $item) {
            $cat_names[$item->id] = $item->name;
        }

        $mform->addElement('select', 'category', get_string('lb_choose_category', 'report_modstats'), $cat_names);
        $this->add_action_buttons(false, get_string('btn_refresh', 'report_modstats'));
    }
}
