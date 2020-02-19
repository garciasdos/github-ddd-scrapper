# GitHub Repository DDD-based Scrapper
Simple service that returns the number of php class types that you have in selected project.

## Installation

- With Docker: Simply run `docker-compose up -d` and you will have a local container with PHP 7.4 plus the basic Symfony dependencies installed.
- After that, run `docker run github-ddd-scrapper_php bin/console app:get-classes-from-repo {owner}/{repository}`

## How I've done it

I have tried to respect a hexagonal architecture throughout the project, however due to lack of time I see some improvements that should be made in the short term:
- Implement more testing
- Extract the RepositoryFiles logic that gets the number of Repo classes to a Domain Service, for example.
- Maybe the folder structure is not 100% correct in the end, because IMHO the ValueObject folder is oversized. I think 
I could split these files into a different structure, due to all the logic that RepositoryFiles now have. Maybe with the previous step this might be solved.
