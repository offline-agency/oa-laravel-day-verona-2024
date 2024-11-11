## Real-Time Laravel Showdown: Laravel Reverb vs. Pusher

This talk will explore two possible solutions for adding real-time functionality to Laravel applications: Laravel Echo
with Laravel Reverb and Pusher. It will examine their architecture, ease of integration, performance, scalability, and
costs to help you choose the solution that best suits your needs.


![Real-Time Laravel Showdown](https://banners.beyondco.de/Real-Time%20Laravel%20Showdown.png?theme=dark&packageManager=&packageName=&pattern=architect&style=style_2&description=Laravel+Reverb+vs.+Pusher&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

## Running the Project Locally

#### 1. Install dependencies via Composer and NPM:

Use Composer and NPM to install all required packages:

```bash
composer install
npm install
```

#### 2. Set Up Environment Variables

Copy `.env.example` to `.env` and adjust the configuration according to your environment.

#### 3. Start the Development Server

Run the Vite development server to enable frontend features:

```bash
npm run dev
```

#### 4. Launch the Reverb Server

Use the Artisan command to start the Reverb server:

```bash
php artisan reverb:start
```

#### Switching Between Pusher and Reverb

To toggle between Pusher and Reverb for broadcasting, update the following lines in your `.env` file:

```dotenv
# For Reverb
BROADCAST_CONNECTION=reverb
BROADCAST_DRIVER=reverb

# For Pusher
BROADCAST_CONNECTION=pusher
BROADCAST_DRIVER=pusher
```

After updating `.env`, make sure to clear the configuration cache for the changes to take effect:
```bash
php artisan config:cache
```

## Testing Application Functionality

The homepage (`/`) includes links in the header to access the `Reverb Dashboard` and `Pusher Dashboard`. Use these
dashboards
to observe real-time updates triggered by the commands below.

#### 1. Create Orders

``` bash
php artisan orders:create {count=5}
```

This command generates the specified number of new orders (default: 5). The new orders will appear automatically on the
dashboard, allowing you to test real-time order updates.

#### 2. Change Order Status

``` bash
php artisan orders:change {id}
```

This command changes the status of a specified order by its ID. The status automatically transitions as follows:

* From new to delivering
* From delivering to delivered

As the status changes, the order’s position on the dashboard updates in real time.

#### 3. Delete All Orders

``` bash
php artisan orders:delete
```

This command deletes all orders from the database. To fully reset the dashboard view, click the “Clear” button on the
dashboard, which removes all displayed orders. This allows you to refresh the dashboard before testing new orders and
status changes.

## Credits

- [Offline Agency](https://github.com/offline-agency)
- [Giacomo Fabbian](https://github.com/Giacomo92)
- [Nicolas Sanavia](https://github.com/SanaviaNicolas)

## About us

Offline Agency is a web design agency based in Padua, Italy. You'll find an overview of our
projects [on our website](https://offlineagency.it/).
