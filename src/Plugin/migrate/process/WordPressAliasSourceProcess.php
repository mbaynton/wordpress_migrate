<?php


/**
 * @file
 * Contains \Drupal\wordpress_migrate\Plugin\migrate\process\DefaultValue.
 */

namespace Drupal\wordpress_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;
use Drupal\node\Entity\Node;

/**
 * This plugin extracts the relative URL for path aliases.
 *
 * @MigrateProcessPlugin(
 *   id = "wordpress_alias_source_process"
 * )
 */
class WordPressAliasSourceProcess extends ProcessPluginBase {
  
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $node = Node::load($value);
    return $node->url();
  }
}
