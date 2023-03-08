## Escooters

### Ideas to extend the app 
- Current location - easy to add, app would require the user's consent.
<img src="https://user-images.githubusercontent.com/92044526/223692783-71a22e72-65d2-402a-90cd-f86b95721db2.png" width="300" height="250" />

- E-scooters nearby - more complicated, based on location user would be able to add e-scooters to map, it would be necessary to create whole authentication system to prevent trolls.
<img src="https://user-images.githubusercontent.com/92044526/223692669-f0e247d6-1daa-4cd1-81f9-711219f8f924.png" width="300" height="250" />
 
- Price comparison - based on average speed and time of travel it would be awesome to check which provider is the best option.
<img src="https://user-images.githubusercontent.com/92044526/223692515-4761343d-7147-44d5-a0d5-209ef6b68552.png" width="300" height="250" />

### Available providers

| No. | Provider | Data source |
|---|---|---|
| 1 | Lime | webscrapped |
| 2 | Bolt | web API |
| 3 | Tier | web API |
| 4 | Bird | webscrapped with partially estimated countries |
| 5 | Voi | webscrapped |
| 6 | Spin | webscrapped |
| 7 | Link | webscrapped |
| 8 | Dott | webscrapped with partially estimated countries |
| 9 | Quick | webscrapped |
| 10 | Neuron | partially webscrapped |
| 11 | Whoosh | hardcoded |
| 12 | Helbiz | hardcoded |

### Development

```
copy .env.example .env
docker-compose run --rm -u "$(id -u):$(id -g)" php composer install
docker-compose run --rm -u "$(id -u):$(id -g)" php php index.php
```
