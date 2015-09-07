<?php
namespace Drupal\wordpress_migrate\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\XmlBase;
use Drupal\migrate\Entity\MigrationInterface;

/**
 * Description of WordPressItemSource
 *
 * @MigrateSource(
 *   id = "wordpress_item_source"
 * )
 */
class WordPressItemSource extends XmlBase {
  public function __construct(array $configuration, $plugin_id, $plugin_definition, MigrationInterface $migration) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $migration);
  }
  
  public function fields() {
    return array(
      'title' => 'Item title',
      'link' => 'WordPress URL of the item',
      'pubDate' => 'Published date',
      'dc:creator' => 'WordPress username of the item author',
      'guid' => 'Alternate URL of the item (?)',
      'description' => '?',
      'content:encoded' => 'Body of the item',
      'excerpt:encoded' => 'Teaser for the item',
      'wp:post_id' => 'Unique ID of the item within the blog',
      'wp:post_date' => 'Date posted (author\s timezone?)',
      'wp:post_date_gmt' => 'Date posted (GMT)',
      'wp:comment_status' => 'Whether comments may be posted to this item (open/closed)',
      'wp:ping_status' => '?',
      'wp:post_name' => 'Trailing component of link',
      'wp:status' => 'Item status (publish/draft/inherit)',
      'wp:post_parent' => 'Parent item ID (?)',
      'wp:menu_order' => 'Equivalent to Drupal weight?',
      'wp:post_type' => 'Item type (post/page/attachment)',
      'wp:post_password' => '?',
      'wp:is_sticky' => 'Equivalent to Drupal sticky flag',
      'category' => 'Categories (as nicename) assigned to this item',
      'tag' => 'Tags (as nicename) assigned to this item',
      'content' => 'Extracted from Wordpress content:encoded',
      'status' => 'Extracted from Wordpress status',
    );
  }
  
  public function getIds() {
    $ids['wp:post_id']['type'] = 'integer';
    $ids['wp:post_id']['alias'] = 'n';
    return $ids;
  }
  
  public function namespaces() {
    return array(
        'wp' => 'http://wordpress.org/export/1.2/'
    );
  }
}
