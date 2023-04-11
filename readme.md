## Escooters

### Ideas to extend the app
- <strong>Current geolocation</strong> - easy to add, map would zoom into that location, app would require the user's consent.

<img src="https://user-images.githubusercontent.com/92044526/223692783-71a22e72-65d2-402a-90cd-f86b95721db2.png" width="300" height="250" />

- <strong>E-scooters nearby</strong> - more complicated, based on location user would be able\
  to add e-scooters to map, it would be necessary to create whole authentication\
  system to prevent trolls.

<img src="https://user-images.githubusercontent.com/92044526/223692669-f0e247d6-1daa-4cd1-81f9-711219f8f924.png" width="300" height="250" />

- <strong>Price comparison</strong> - based on average speed and time of travel it would be\
  awesome to check which provider is the best option.

<img src="https://user-images.githubusercontent.com/92044526/223692515-4761343d-7147-44d5-a0d5-209ef6b68552.png" width="300" height="250" />

- <strong>Guidelines and law</strong> - countries can have different laws that treats e-scooters\
  differently, adding guidelines would be helpful to people who are not into e-scooters.
  
<img src="https://user-images.githubusercontent.com/92044526/223866818-38dbcf95-81ea-4ebf-90cc-3ff526560724.png" width="300" height="250" />

- <strong>Rating providers</strong>

<img src="https://user-images.githubusercontent.com/92044526/223869905-3808d19f-5acc-4614-87ed-4ded1bd74308.png" width="300" height="250" />

- <strong>Discounts</strong>

<img src="https://user-images.githubusercontent.com/92044526/223873456-fc1f404f-89e3-4437-bfb5-7109cdb40d81.png" width="500" height="220" />

- <strong>Places visited</strong>

<img src="https://user-images.githubusercontent.com/92044526/223875974-ccab5e91-5afc-419c-bacc-39828e3bf8f8.png" width="300" height="250" />

### Technically
I know this is just PoC but in order to properly develop and maintain the application, it is necessary to refactor the code and separate it into components. This will allow for better organization, reusability, and easier debugging.

Additionally, to implement authentication and other functionality, a backend written in a framework rather than pure PHP will be necessary. This will provide a more robust and secure solution, with built-in functionality for handling user authentication, data storage and retrieval, and other important features.


### Last build
```
Build date: 2023-03-31 02:07:10

24 cities fetched for BitMobility.
40 cities fetched for Helbiz.
199 cities fetched for Bolt.
49 cities fetched for Spin.
30 cities fetched for Neuron.
18 cities fetched for Whoosh.
17 cities fetched for Quick.
100 cities fetched for Voi.
121 cities fetched for Bird.
29 cities fetched for Dott.
303 cities fetched for Lime.
361 cities fetched for Tier.
0 cities fetched for Link.
2 cities fetched for Hulaj.

777 cities fetched.
Cached cities loaded.
```

### Available providers

| No. | Provider    | Data source                                   |
|-----|-------------|-----------------------------------------------|
| 1   | Lime        | webscrapped                                   |
| 2   | Bolt        | web API                                       |
| 3   | Tier        | web API                                       |
| 4   | Bird        | webscrapped with partially estimated countries|
| 5   | Voi         | webscrapped                                   |
| 6   | Spin        | webscrapped                                   |
| 7   | Link        | webscrapped                                   |
| 8   | Dott        | webscrapped with partially estimated countries|
| 9   | Quick       | webscrapped                                   |
| 10  | Neuron      | partially webscrapped                         |
| 11  | Whoosh      | hardcoded                                     |
| 12  | Helbiz      | hardcoded                                     |
| 13  | BitMobility | webscrapped with partially estimated countries|
| 14  | Hulaj       | webscrapped                                   |


### Development

```
copy .env.example .env
docker-compose run --rm -u "$(id -u):$(id -g)" php composer install
docker-compose run --rm -u "$(id -u):$(id -g)" php php index.php
```
