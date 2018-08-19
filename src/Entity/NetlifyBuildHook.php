<?php

namespace Drupal\netlify_webhooks\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Netlify build hook entity.
 *
 * @ConfigEntityType(
 *   id = "netlify_build_hook",
 *   label = @Translation("Netlify build hook"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\netlify_webhooks\NetlifyBuildHookListBuilder",
 *     "form" = {
 *       "add" = "Drupal\netlify_webhooks\Form\NetlifyBuildHookForm",
 *       "edit" = "Drupal\netlify_webhooks\Form\NetlifyBuildHookForm",
 *       "delete" = "Drupal\netlify_webhooks\Form\NetlifyBuildHookDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\netlify_webhooks\NetlifyBuildHookHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "netlify_build_hook",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/services/netlify-webhooks/netlify_build_hook/{netlify_build_hook}",
 *     "add-form" = "/admin/config/services/netlify-webhooks/netlify_build_hook/add",
 *     "edit-form" = "/admin/config/services/netlify-webhooks/netlify_build_hook/{netlify_build_hook}/edit",
 *     "delete-form" = "/admin/config/services/netlify-webhooks/netlify_build_hook/{netlify_build_hook}/delete",
 *     "collection" = "/admin/config/services/netlify-webhooks/netlify_build_hook"
 *   }
 * )
 */
class NetlifyBuildHook extends ConfigEntityBase implements NetlifyBuildHookInterface {

  /**
   * The Netlify build hook ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Netlify build hook label.
   *
   * @var string
   */
  protected $label;

}
