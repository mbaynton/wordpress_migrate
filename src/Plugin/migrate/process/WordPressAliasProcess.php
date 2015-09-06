<?php


/**
 * @file
 * Contains \Drupal\wordpress_migrate\Plugin\migrate\process\DefaultValue.
 */

namespace Drupal\wordpress_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;


/**
 * This plugin extracts the relative URL for path aliases.
 *
 * @MigrateProcessPlugin(
 *   id = "wordpress_alias_process"
 * )
 */
class WordPressAliasProcess extends ProcessPluginBase {
  
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // expect $value to be an absolute URL
    $parsed = parse_url($value);
    if($parsed === false) {
      return $value;
    } else {
      return preg_replace('|/$|', '', $parsed['path']);
    }
  }
}
