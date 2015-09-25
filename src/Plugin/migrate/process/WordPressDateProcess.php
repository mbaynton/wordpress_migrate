<?php


/**
 * @file
 * Contains \Drupal\wordpress_migrate\Plugin\migrate\process\WordPressDateProcess.
 */

namespace Drupal\wordpress_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;


/**
 * This plugin extracts the relative URL for path aliases.
 *
 * @MigrateProcessPlugin(
 *   id = "wordpress_date_process"
 * )
 */
class WordPressDateProcess extends ProcessPluginBase {
  
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $value = strtotime($value);
    if(! $value || $value < 0) {
      $value = strtotime($row->getSource()['wp:post_date']);
    }
    if(! $value || $value < 0) {
      $value = time();
    }
    
    return $value;
  }
}
