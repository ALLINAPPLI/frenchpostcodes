<?php
  use CRM_Frenchcodepostaux_ExtensionUtil as E;
  return [
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN',
      'entity' => 'UFGroup',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'Profil_adresse_avec_API_BAN',
          'group_type' => [
            'Individual',
            'Contact',
          ],
          'title' => E::ts('Profil adresse avec API BAN'),
          'frontend_title' => E::ts('Profil adresse avec API BAN'),
          'description' => E::ts("Profil spécifique pour la gestion des adresses avec l'API BAN française pour le calcul des adresses."),
          'created_date' => '2024-09-20 20:08:34',
          'add_cancel_button' => FALSE,
        ],
        'match' => [
          'name',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_1',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name' => 'last_name',
          'is_required' => TRUE,
          'label' => E::ts('Nom de famille'),
          'field_type' => 'Individual',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_2',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name' => 'first_name',
          'is_required' => TRUE,
          'label' => E::ts('Prénom'),
          'field_type' => 'Individual',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_3',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name' => 'email',
          'is_required' => TRUE,
          'label' => E::ts('Courriel (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_4',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name' => 'street_address',
          'label' => E::ts('Rue (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_5',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name' => 'supplemental_address_1',
          'label' => E::ts("Complément d'adresse 1 (Primary)"),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_6',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name' => 'postal_code',
          'label' => E::ts('Code postal (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_7',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name' => 'city',
          'label' => E::ts('Ville (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_avec_API_BAN_UFField_8',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_avec_API_BAN',
          'field_name:name' => 'Champs_saisie_adresse_France.Saisie_Adresse_api_BAN',
          'label' => E::ts('Saisie Adresse api BAN'),
          'field_type' => 'Contact',
        ],
      ],
    ],
  ];