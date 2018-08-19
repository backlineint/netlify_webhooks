<?php

namespace Drupal\netlify_webhooks\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class NetlifyBuildHookForm.
 */
class NetlifyBuildHookForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $netlify_build_hook = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $netlify_build_hook->label(),
      '#description' => $this->t("Label for the Netlify build hook."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $netlify_build_hook->id(),
      '#machine_name' => [
        'exists' => '\Drupal\netlify_webhooks\Entity\NetlifyBuildHook::load',
      ],
      '#disabled' => !$netlify_build_hook->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $netlify_build_hook = $this->entity;
    $status = $netlify_build_hook->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Netlify build hook.', [
          '%label' => $netlify_build_hook->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Netlify build hook.', [
          '%label' => $netlify_build_hook->label(),
        ]));
    }
    $form_state->setRedirectUrl($netlify_build_hook->toUrl('collection'));
  }

}
