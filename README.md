# GoogleGeocodingAPI Package
This service involves geocoding static addresses for the purpose of placement of application content on a map.
* Domain: google.com
* Credentials: api_key

## How to get credentials: 
0. Go to [Google Developers Console](https://console.developers.google.com/?authuser=1);
1. Select a project, or create a new one.
2. Press **Continue** to activate API key.
3. In the sidebar on the left, select **Credentials**.
4. If your project has no API key for the server, create it now - **Add credentials > API key > Server key**;

## TOC: 
* [addressToCoordinates](#addressToCoordinates)
* [getAddressComponents](#getAddressComponents)
* [coordinatesToAddress](#coordinatesToAddress)
 
<a name="addressToCoordinates"/>
## GoogleGeocodingAPI.addressToCoordinates
Convert a free form address to a set of coordinates (latitude, longitude).

| Field  | Type  | Description
|--------|-------|----------
| api_key| String| The API key obtained from Google APIs.
| address| String| The exact address that you want to geocode, in the format used by the respective country's postal service.

#### Request example
```json
{	"api_key": "...",
	"address": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'lat' : 37.4224764,
                            'lng' : -122.0842499
                            }"
		}
	}
}
```

<a name="getAddressComponents"/>
## GoogleGeocodingAPI.getAddressComponents
Convert a free form address string to an object with it's different properties (street number, route, country, etc...).

| Field  | Type  | Description
|--------|-------|----------
| api_key| String| The API key obtained from Google APIs.
| address| String| The exact address that you want to geocode, in the format used by the respective country's postal service.

#### Request example
```json
{	"api_key": "...",
	"address": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'street_number': '1600',
                            'route' : 'Amphitheatre Pkwy',
                            'locality': 'Mountain View',
                            'administrative_area_level_2' : 'Santa Clara County'
                            }"
		}
	}
}
```

<a name="coordinatesToAddress"/>
## GoogleGeocodingAPI.coordinatesToAddress
Convert a location's coordinates on the map to an address string.

| Field    | Type  | Description
|----------|-------|----------
| api_key  | String| The API key obtained from Google APIs.
| latitude | String| The latitude find the place
| longitude| String| The longitude find the place

#### Request example
```json
{	"api_key": "...",
	"latitude": "...",
	"longitude": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'results': [{
                                    'address_components': [{
                                            'long_name': 'New York City Hall',
                                            'short_name': 'New York City Hall',
                                            'types': ['premise']
                                        }, {
                                            'long_name': 'Lower Manhattan',
                                            'short_name': 'Lower Manhattan',
                                            'types': ['neighborhood', 'political']
                                        }, {
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }, {
                                            'long_name': '10007',
                                            'short_name': '10007',
                                            'types': ['postal_code']
                                        }],
                                    'formatted_address': 'New York City Hall, New York, NY 10007, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.71302010000001,
                                                'lng': -74.00556569999999
                                            },
                                            'southwest': {
                                                'lat': 40.7124477,
                                                'lng': -74.0064356
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7127461,
                                            'lng': -74.00597399999999
                                        },
                                        'location_type': 'ROOFTOP',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.71408288029151,
                                                'lng': -74.00465166970849
                                            },
                                            'southwest': {
                                                'lat': 40.71138491970851,
                                                'lng': -74.0073496302915
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJMfxeDCJawokRaUdk7prx_pY',
                                    'types': ['premise']
                                }, {
                                    'address_components': [{
                                            'long_name': '230',
                                            'short_name': '230',
                                            'types': ['street_number']
                                        }, {
                                            'long_name': 'Broadway',
                                            'short_name': 'Broadway',
                                            'types': ['route']
                                        }, {
                                            'long_name': 'Lower Manhattan',
                                            'short_name': 'Lower Manhattan',
                                            'types': ['neighborhood', 'political']
                                        }, {
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }, {
                                            'long_name': '10007',
                                            'short_name': '10007',
                                            'types': ['postal_code']
                                        }],
                                    'formatted_address': '230 Broadway, New York, NY 10007, USA',
                                    'geometry': {
                                        'location': {
                                            'lat': 40.7127655,
                                            'lng': -74.00599369999999
                                        },
                                        'location_type': 'ROOFTOP',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.7141144802915,
                                                'lng': -74.00464471970849
                                            },
                                            'southwest': {
                                                'lat': 40.7114165197085,
                                                'lng': -74.0073426802915
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJVzXOjBhawokRSp5VqCM4F9Q',
                                    'types': ['street_address']
                                }, {
                                    'address_components': [{
                                            'long_name': 'NYC Department of Education',
                                            'short_name': 'NYC Department of Education',
                                            'types': ['establishment', 'point_of_interest']
                                        }, {
                                            'long_name': '52',
                                            'short_name': '52',
                                            'types': ['street_number']
                                        }, {
                                            'long_name': 'Chambers Street',
                                            'short_name': 'Chambers St',
                                            'types': ['route']
                                        }, {
                                            'long_name': 'Lower Manhattan',
                                            'short_name': 'Lower Manhattan',
                                            'types': ['neighborhood', 'political']
                                        }, {
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }, {
                                            'long_name': '10007',
                                            'short_name': '10007',
                                            'types': ['postal_code']
                                        }],
                                    'formatted_address': 'NYC Department of Education, 52 Chambers St, New York, NY 10007, USA',
                                    'geometry': {
                                        'location': {
                                            'lat': 40.713473,
                                            'lng': -74.0054961
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.7148219802915,
                                                'lng': -74.00414711970849
                                            },
                                            'southwest': {
                                                'lat': 40.7121240197085,
                                                'lng': -74.00684508029151
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJhZDxHiJawokR7NkW5vFe-No',
                                    'types': ['establishment', 'point_of_interest', 'political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'Civic Center',
                                            'short_name': 'Civic Center',
                                            'types': ['neighborhood', 'political']
                                        }, {
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'Civic Center, New York, NY, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.71776149999999,
                                                'lng': -73.9982199
                                            },
                                            'southwest': {
                                                'lat': 40.7097756,
                                                'lng': -74.00873419999999
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7140519,
                                            'lng': -74.00283639999999
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.71776149999999,
                                                'lng': -73.9982199
                                            },
                                            'southwest': {
                                                'lat': 40.7097756,
                                                'lng': -74.00873419999999
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJEZaa1SNawokRXvMbRrc0HC8',
                                    'types': ['neighborhood', 'political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'Financial District',
                                            'short_name': 'Financial District',
                                            'types': ['neighborhood', 'political']
                                        }, {
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'Financial District, New York, NY, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.7170449,
                                                'lng': -73.99938779999999
                                            },
                                            'southwest': {
                                                'lat': 40.7005852,
                                                'lng': -74.0164805
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7074909,
                                            'lng': -74.0112764
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.7170449,
                                                'lng': -73.99938779999999
                                            },
                                            'southwest': {
                                                'lat': 40.7005852,
                                                'lng': -74.0164805
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJB8iKMxhawokRs5oRixSsKwA',
                                    'types': ['neighborhood', 'political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'Lower Manhattan',
                                            'short_name': 'Lower Manhattan',
                                            'types': ['neighborhood', 'political']
                                        }, {
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'Lower Manhattan, New York, NY, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.7425263,
                                                'lng': -73.97164459999999
                                            },
                                            'southwest': {
                                                'lat': 40.7004631,
                                                'lng': -74.01933500000001
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7230084,
                                            'lng': -74.00063279999999
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.7425263,
                                                'lng': -73.97164459999999
                                            },
                                            'southwest': {
                                                'lat': 40.7004631,
                                                'lng': -74.01933500000001
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJi4MZVIhZwokRPNvWbi-c0wI',
                                    'types': ['neighborhood', 'political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'Manhattan, New York, NY, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.882214,
                                                'lng': -73.907
                                            },
                                            'southwest': {
                                                'lat': 40.6803955,
                                                'lng': -74.047285
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7830603,
                                            'lng': -73.9712488
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.820045,
                                                'lng': -73.90331300000001
                                            },
                                            'southwest': {
                                                'lat': 40.698078,
                                                'lng': -74.03514899999999
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJYeZuBI9YwokRjMDs_IEyCwo',
                                    'types': ['political', 'sublocality', 'sublocality_level_1']
                                }, {
                                    'address_components': [{
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'New York, NY, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.9152555,
                                                'lng': -73.70027209999999
                                            },
                                            'southwest': {
                                                'lat': 40.496044,
                                                'lng': -74.255735
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7127837,
                                            'lng': -74.0059413
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.9152555,
                                                'lng': -73.70027209999999
                                            },
                                            'southwest': {
                                                'lat': 40.496044,
                                                'lng': -74.255735
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJOwg_06VPwokRYv534QaPC8g',
                                    'types': ['locality', 'political']
                                }, {
                                    'address_components': [{
                                            'long_name': '10007',
                                            'short_name': '10007',
                                            'types': ['postal_code']
                                        }, {
                                            'long_name': 'Lower Manhattan',
                                            'short_name': 'Lower Manhattan',
                                            'types': ['neighborhood', 'political']
                                        }, {
                                            'long_name': 'Manhattan',
                                            'short_name': 'Manhattan',
                                            'types': ['political', 'sublocality', 'sublocality_level_1']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'New York',
                                            'types': ['locality', 'political']
                                        }, {
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'New York, NY 10007, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.717076,
                                                'lng': -74.0001781
                                            },
                                            'southwest': {
                                                'lat': 40.709806,
                                                'lng': -74.01375399999999
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7136487,
                                            'lng': -74.0087126
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.717076,
                                                'lng': -74.0001781
                                            },
                                            'southwest': {
                                                'lat': 40.709806,
                                                'lng': -74.01375399999999
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJwbJsUhhawokRuCRdc8piF8c',
                                    'types': ['postal_code']
                                }, {
                                    'address_components': [{
                                            'long_name': 'New York County',
                                            'short_name': 'New York County',
                                            'types': ['administrative_area_level_2', 'political']
                                        }, {
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'New York County, NY, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 40.87927800000001,
                                                'lng': -73.907
                                            },
                                            'southwest': {
                                                'lat': 40.6838815,
                                                'lng': -74.04723679999999
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7830603,
                                            'lng': -73.9712488
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 40.87927800000001,
                                                'lng': -73.907
                                            },
                                            'southwest': {
                                                'lat': 40.6838815,
                                                'lng': -74.04723679999999
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJOwE7_GTtwokRFq0uOwLSE9g',
                                    'types': ['administrative_area_level_2', 'political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'New York-Northern New Jersey-Long Island, NY-NJ-PA',
                                            'short_name': 'New York-Northern New Jersey-Long Island, NY-NJ-PA',
                                            'types': ['political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'New York-Northern New Jersey-Long Island, NY-NJ-PA, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 41.6018065,
                                                'lng': -71.85621399999999
                                            },
                                            'southwest': {
                                                'lat': 39.49853299999999,
                                                'lng': -75.3585939
                                            }
                                        },
                                        'location': {
                                            'lat': 40.9590293,
                                            'lng': -74.0300122
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 41.6018065,
                                                'lng': -71.85621399999999
                                            },
                                            'southwest': {
                                                'lat': 39.49853299999999,
                                                'lng': -75.3585939
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJ3YJV4PRWwokRFFI21ZrHXtQ',
                                    'types': ['political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'New York Metropolitan Area',
                                            'short_name': 'New York Metropolitan Area',
                                            'types': ['political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'New York Metropolitan Area, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 42.0809059,
                                                'lng': -71.777491
                                            },
                                            'southwest': {
                                                'lat': 39.475198,
                                                'lng': -75.3587649
                                            }
                                        },
                                        'location': {
                                            'lat': 40.7127761,
                                            'lng': -74.00595439999999
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 42.0809059,
                                                'lng': -71.777491
                                            },
                                            'southwest': {
                                                'lat': 39.475198,
                                                'lng': -75.3587649
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJ-5Z24NaGwokRiMh4Rj8FNMo',
                                    'types': ['political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'New York',
                                            'short_name': 'NY',
                                            'types': ['administrative_area_level_1', 'political']
                                        }, {
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'New York, USA',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 45.0158651,
                                                'lng': -71.85620639999999
                                            },
                                            'southwest': {
                                                'lat': 40.4960911,
                                                'lng': -79.7621439
                                            }
                                        },
                                        'location': {
                                            'lat': 43.2994285,
                                            'lng': -74.21793260000001
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 45.0156274,
                                                'lng': -71.85620639999999
                                            },
                                            'southwest': {
                                                'lat': 40.4960911,
                                                'lng': -79.7621439
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJqaUj8fBLzEwRZ5UY3sHGz90',
                                    'types': ['administrative_area_level_1', 'political']
                                }, {
                                    'address_components': [{
                                            'long_name': 'United States',
                                            'short_name': 'US',
                                            'types': ['country', 'political']
                                        }],
                                    'formatted_address': 'United States',
                                    'geometry': {
                                        'bounds': {
                                            'northeast': {
                                                'lat': 71.3867745,
                                                'lng': -66.9502861
                                            },
                                            'southwest': {
                                                'lat': 18.910677,
                                                'lng': 172.4458955
                                            }
                                        },
                                        'location': {
                                            'lat': 37.09024,
                                            'lng': -95.712891
                                        },
                                        'location_type': 'APPROXIMATE',
                                        'viewport': {
                                            'northeast': {
                                                'lat': 49.38,
                                                'lng': -66.94
                                            },
                                            'southwest': {
                                                'lat': 25.82,
                                                'lng': -124.39
                                            }
                                        }
                                    },
                                    'place_id': 'ChIJCzYy5IS16lQRQrfeQ5K5Oxw',
                                    'types': ['country', 'political']
                                }],
                            'status': 'OK'
                        } "
		}
	}
}
```

