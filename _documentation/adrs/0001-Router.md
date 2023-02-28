# 1. Router
> Date: 28.02.2023

## Context 
We need to create a universal router for better organization in project files to make it SEO-friendly for URLs without extensions. We need to listen to all basic types of requests and respond to them properly. Respond with the correct error status code if the page was not found.

## Decision 
We used .htaccess to route all traffic through the index file in the public directory, because we didn't want to access other files in the public server directory. We created a Router class with the protected variable of created classes to go through and respond with a function written in adding a new route.

## Consequences
In the future, we will need to expand this function to use class methods instead of local functions. We will need to secure Cross-site request forgery.