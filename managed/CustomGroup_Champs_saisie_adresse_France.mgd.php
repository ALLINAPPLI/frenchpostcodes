<?php
  use CRM_Frenchcodepostaux_ExtensionUtil as E;
  return [
    [
      'name' => 'CustomGroup_Champs_saisie_adresse_France',
      'entity' => 'CustomGroup',
      'cleanup' => 'always',
      'update' => 'always',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'Champs_saisie_adresse_France',
          'title' => E::ts('Champs saisie adresse France'),
          'style' => 'Inline',
          'help_pre' => '',
          'help_post' => '',
          'weight' => 4,
          'collapse_adv_display' => TRUE,
          'created_date' => '2024-09-19 12:44:41',
          'icon' => '',
        ],
        'match' => [
          'name',
        ],
      ],
    ],
    [
      'name' => 'CustomGroup_Champs_saisie_adresse_France_CustomField_Saisie_Adresse_api_BAN',
      'entity' => 'CustomField',
      'cleanup' => 'always',
      'update' => 'always',
      'params' => [
        'version' => 4,
        'values' => [
          'custom_group_id.name' => 'Champs_saisie_adresse_France',
          'name' => 'Saisie_Adresse_api_BAN',
          'label' => E::ts('Saisie Adresse api BAN'),
          'html_type' => 'Text',
          'text_length' => 255,
          'note_columns' => 60,
          'note_rows' => 4,
          'column_name' => 'saisie_adresse_api_ban_48',
        ],
        'match' => [
          'name',
          'custom_group_id',
        ],
      ],
    ],
  ];