<?php

use App\Models\User;

beforeEach(function () {
    $this->bootRefreshesSchemaCache();
    rolesSeed();
    $this->user = User::factory()->create();
    $this->query = 'query Settings {
        me {
          ulid,
          name,
          email,
          biosps{
            ulid
            name
            beneficiaries{
              ulid
              full_name
              birth_date
              number_of_visits
              service_date
              home_care
              date_received,
              status
              other_document_type
              other_reason_opening_case
              other_forwarded_service
              specify_purpose_of_visit
              visit_proposes
              genre{
                ulid
                name
              }
                  provenance{
                    ulid
                name
                  }
          reason_opening_case{
            ulid
                name
          }
          document_type{
           ulid
                name
          }
          forwarded_service{
            ulid
                name
          }
          purpose_of_visit{
            ulid
                name
          }

              created_at
              updated_at

            }
            neighborhood{
              ulid
              name
            }
            documentTypes{
              name
              ulid
            }
            forwardedServices{
              name
              ulid
            }
            genres{
              ulid
              name
            }
            provenances{
              ulid
              name
            }
            purposeOfVisits{
              ulid
              name
            }
            reasonOpeningCases{
              ulid
              name
            }
          }
          created_at,
          updated_at,
        }
      }';
});

it('should get all resources correctly', function () {
    $user = login(roles: 'aosp');
    $beneficiary = \App\Models\Beneficiary::factory()->create();
    $biosp = $beneficiary->biosp;
    $biosp->genres()->sync($beneficiary->genre->ulid);
    $biosp->provenances()->sync($beneficiary->provenance_ulid);
    $biosp->forwardedServices()->sync($beneficiary->forwarded_service_ulid);
    $biosp->documentTypes()->sync($beneficiary->document_type_ulid);
    $biosp->purposeOfVisits()->sync($beneficiary->purpose_of_visit_ulid);
    $biosp->reasonOpeningCases()->sync($beneficiary->reason_opening_case_ulid);

    $user->biosps()->sync($beneficiary->biosp_ulid);

    $token = $user->createToken('token')->plainTextToken;
    $response = $this->graphQL(query: $this->query)->assertJson([
        'data' => [
            'me' => [
                'ulid' => $user->ulid,
                'name' => $user->name,
                'email' => $user->email,
                'biosps' => [
                    [
                        'ulid' => $biosp->ulid,
                        'name' => $biosp->name,
                        'beneficiaries' => [
                            [
                                'ulid' => $beneficiary->ulid,
                                'full_name' => $beneficiary->full_name,
                                'birth_date' => $beneficiary->birth_date->format('Y-m-d'),
                                'number_of_visits' => $beneficiary->number_of_visits,
                                'service_date' => $beneficiary->service_date->format('Y-m-d'),
                                'home_care' => $beneficiary->home_care,
                                'date_received' => $beneficiary->date_received->format('Y-m-d'),
                                'status' => $beneficiary->status,
                                'other_document_type' => $beneficiary->other_document_type,
                                'other_reason_opening_case' => $beneficiary->other_reason_opening_case,
                                'other_forwarded_service' => $beneficiary->other_forwarded_service,
                                'specify_purpose_of_visit' => $beneficiary->specify_purpose_of_visit,
                                'visit_proposes' => $beneficiary->visit_proposes,
                                'genre' => [
                                    'ulid' => $beneficiary->genre->ulid,
                                    'name' => $beneficiary->genre->name,
                                ],
                                'provenance' => [
                                    'ulid' => $beneficiary->provenance_ulid,
                                    'name' => $beneficiary->provenance->name,
                                ],
                                'reason_opening_case' => [
                                    'ulid' => $beneficiary->reason_opening_case_ulid,
                                    'name' => $beneficiary->reason_opening_case->name,
                                ],
                                'document_type' => [
                                    'ulid' => $beneficiary->document_type_ulid,
                                    'name' => $beneficiary->document_type->name,
                                ],
                                'forwarded_service' => [
                                    'ulid' => $beneficiary->forwarded_service_ulid,
                                    'name' => $beneficiary->forwarded_service->name,
                                ],
                                'purpose_of_visit' => [
                                    'ulid' => $beneficiary->purpose_of_visit_ulid,
                                    'name' => $beneficiary->purpose_of_visit->name,
                                ],
                                'created_at' => $beneficiary->created_at,
                                'updated_at' => $beneficiary->updated_at,
                            ],
                        ],
                        'neighborhood' => [
                            'ulid' => $biosp->neighborhood->ulid,
                            'name' => $biosp->neighborhood->name,
                        ],
                        'documentTypes' => [
                            [
                                'name' => $beneficiary->document_type->name,
                                'ulid' => $beneficiary->document_type_ulid,
                            ],
                        ],
                        'forwardedServices' => [
                            [
                                'name' => $beneficiary->forwarded_service->name,
                                'ulid' => $beneficiary->forwarded_service_ulid,
                            ],
                        ],
                        'genres' => [
                            [
                                'ulid' => $beneficiary->genre->ulid,
                                'name' => $beneficiary->genre->name,
                            ],
                        ],
                        'provenances' => [
                            [
                                'ulid' => $beneficiary->provenance_ulid,
                                'name' => $beneficiary->provenance->name,
                            ],
                        ],
                        'purposeOfVisits' => [
                            [
                                'ulid' => $beneficiary->purpose_of_visit_ulid,
                                'name' => $beneficiary->purpose_of_visit->name,
                            ],
                        ],
                        'reasonOpeningCases' => [
                            [
                                'ulid' => $beneficiary->reason_opening_case_ulid,
                                'name' => $beneficiary->reason_opening_case->name,
                            ],
                        ],
                    ],
                ],
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,

            ],
        ],
    ])
        ->assertJsonStructure([
            'data' => [
                'me' => [
                    'ulid',
                    'name',
                    'email',
                    'biosps' => [
                        [
                            'ulid',
                            'name',
                            'beneficiaries' => [
                                [
                                    'ulid',
                                    'full_name',
                                    'birth_date',
                                    'number_of_visits',
                                    'service_date',
                                    'home_care',
                                    'date_received',
                                    'status',
                                    'other_document_type',
                                    'other_reason_opening_case',
                                    'other_forwarded_service',
                                    'specify_purpose_of_visit',
                                    'visit_proposes',
                                    'genre' => [
                                        'ulid',
                                        'name',
                                    ],
                                    'provenance' => [
                                        'ulid',
                                        'name',
                                    ],
                                    'reason_opening_case' => [
                                        'ulid',
                                        'name',
                                    ],
                                    'document_type' => [
                                        'ulid',
                                        'name',
                                    ],
                                    'forwarded_service' => [
                                        'ulid',
                                        'name',
                                    ],
                                    'purpose_of_visit' => [
                                        'ulid',
                                        'name',
                                    ],
                                    'created_at',
                                    'updated_at',
                                ],
                            ],
                            'neighborhood' => [
                                'ulid',
                                'name',
                            ],
                            'documentTypes' => [
                                [
                                    'name',
                                    'ulid',
                                ],
                            ],
                            'forwardedServices' => [
                                [
                                    'name',
                                    'ulid',
                                ],
                            ],
                            'genres' => [
                                [
                                    'ulid',
                                    'name',
                                ],
                            ],
                            'provenances' => [
                                [
                                    'ulid',
                                    'name',
                                ],
                            ],
                            'purposeOfVisits' => [
                                [
                                    'ulid',
                                    'name',
                                ],
                            ],
                            'reasonOpeningCases' => [
                                [
                                    'ulid',
                                    'name',
                                ],
                            ],
                        ],
                    ],
                    'created_at',
                    'updated_at',
                ],
            ],
        ])->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ]);
});
