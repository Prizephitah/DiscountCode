# Discount Code Architecture
To build the system a simple, classic tech stack was chosen. PHP as the core language 
with PostgreSQL and Redis for data storage. Any webserver can be used, but Apache is 
used as an example. A service for sending transactional mail is also used, but no recommendation made.

![Tech stack](http://www.plantuml.com/plantuml/proxy?cache=no&src=https://raw.githubusercontent.com/Prizephitah/DiscountCode/master/docs/Tech.puml)

Below follow UML diagrams for the different user stories with solution suggestions.

## Generating a code
> As a brand I want to have discount codes generated for me so that I don’t have to deal 
> with this administration myself.

Deployment diagram over the call to generate a discount code. Designed to show where things are in the stack.

![Tech stack](http://www.plantuml.com/plantuml/proxy?cache=no&src=https://raw.githubusercontent.com/Prizephitah/DiscountCode/master/docs/GenerateCode.puml)

## Getting a code

Sequence diagram of how a discount code is fetched for a user.

![Tech stack](http://www.plantuml.com/plantuml/proxy?cache=no&src=https://raw.githubusercontent.com/Prizephitah/DiscountCode/master/docs/GetCode.puml)

## Notify of Usage

Sequence diagram that builds upon [Getting a code](#Getting a code) to show how notification to the Brand can be made.

![Tech stack](http://www.plantuml.com/plantuml/proxy?cache=no&src=https://raw.githubusercontent.com/Prizephitah/DiscountCode/master/docs/NotifyOfUsage.puml)
