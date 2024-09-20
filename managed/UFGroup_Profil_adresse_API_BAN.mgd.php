<?php
  use CRM_Frenchcodepostaux_ExtensionUtil as E;
  
  return [
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN',
      'entity' => 'UFGroup',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'Profil_adresse_API_BAN',
          'group_type' => [
            'Contact',
            'Individual',
          ],
          'title' => E::ts('Profil adresse API BAN'),
          'frontend_title' => E::ts('Profil adresse API BAN'),
          'description' => E::ts("Profil spécifique pour la gestion des adresses avec l'API BAN française"),
          'created_date' => '2024-09-20 14:06:31',
          'add_cancel_button' => FALSE,
        ],
        'match' => [
          'name',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN_UFField_1',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_API_BAN',
          'field_name' => 'street_address',
          'label' => E::ts('Rue (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN_UFField_2',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_API_BAN',
          'field_name' => 'postal_code',
          'label' => E::ts('Code postal (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN_UFField_3',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_API_BAN',
          'field_name' => 'city',
          'label' => E::ts('Ville (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN_UFField_4',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_API_BAN',
          'field_name' => 'email',
          'label' => E::ts('Courriel (Primary)'),
          'field_type' => 'Contact',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN_UFField_5',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_API_BAN',
          'field_name' => 'last_name',
          'label' => E::ts('Nom de famille'),
          'field_type' => 'Individual',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN_UFField_6',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_API_BAN',
          'field_name' => 'first_name',
          'label' => E::ts('Prénom'),
          'field_type' => 'Individual',
        ],
      ],
    ],
    [
      'name' => 'UFGroup_Profil_adresse_API_BAN_UFField_7',
      'entity' => 'UFField',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'uf_group_id.name' => 'Profil_adresse_API_BAN',
          'field_name:name' => 'Champs_saisie_adresse_France.Saisie_Adresse_api_BAN',
          'help_pre' => E::ts('Si votre adresse principale est différente, veuillez renseignez une nouvelle adresse avec le champ ci dessous'),
          'label' => E::ts('Saisie Adresse api BAN'),
          'field_type' => 'Contact',
        ],
      ],
    ],
  ];