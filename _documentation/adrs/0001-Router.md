# 1. Router
> Date: 28.02.2023

## Context 
We need to create a universal router for better organization in project files to make it SEO-friendly for URLs without extensions. We need to listen to all basic types of requests and respond to them properly. Respond with the correct error status code if the page was not found.

## Decision 
We used .htaccess to route all traffic through the index file in the public directory, because we didn't want to access other files in the public server directory. We created an array of Route objects, which contains properties about current route like path, ENUM Method type and callback function. When accessing the path, we search through this list to find the exact result and we call the function.

## Consequences
In the future, we will need to secure Cross-site request forgery and dynamic routes, route caching.