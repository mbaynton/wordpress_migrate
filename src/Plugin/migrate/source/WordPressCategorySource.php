<?php
namespace Drupal\wordpress_migrate\Plugin\migrate\source;

/**
 * Description of WordPressAttachmentSource
 *
 * @MigrateSource(
 *   id = "wordpress_category_source"
 * )
 */
class WordPressCategorySource extends WordPressItemSource {

  public function fields() {
    return array(
      'wp:term_id' => 'WordPress Term ID',
      'wp:category_nicename' => 'Analogous to machine name',
      'wp:category_parent' => 'category_nicename of the parent term',
      'wp:cat_name' => 'Human name of term',
    );
  }
  
  public function getIds() {
    $ids['wp:category_nicename']['type'] = 'string';
    $ids['wp:category_nicename']['alias'] = 'c';
    return $ids;
  }
  
}
