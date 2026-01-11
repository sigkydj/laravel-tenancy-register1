
In this simple Laravel 12 project, stancl/tenancy 3.9 is implemented.

in the main branch all is ok , but in tenant-user the links , url they are broken,

Creating tenants using the `-mc` option to register them works perfectly.

The problem we encountered was that configuring the central routes and routes for tenants didn't work, even with PHP version 8.2 or higher. Even though the links or URLs appear correct, they still redirect to the central routes.
