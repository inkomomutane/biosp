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

it('should forbid unauthenticated user via graphql.', function () {
    $response = $this->graphQL(query: $this->query)->assertJson([
        'errors' => [
            ['message' => 'Unauthenticated.']
        ]
    ]);
});

it('should forbid user', function (User $user) {
    $token = $user->createToken('token')->plainTextToken;
    $response = $this->graphQL(query: $this->query)->assertJson([
        'errors' => [
            ['message' => 'This action is unauthorized.']
        ]
    ])->withHeaders([
        'Authorization' => 'Bearer ' . $token
    ]);
})->with(
    [
        'super-admin role.' => fn () => login(),
        'admin role.' => fn () => login(roles: 'admin'),
        'aosp-admin role.' => fn () => login(roles: 'aosp-admin')
    ]
);


