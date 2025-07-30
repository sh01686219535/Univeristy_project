@extends('frontend.home.master')
@section('content')
    <section class="contact-section">
        <header>
            <h2>How Basabari Works</h2>
            <p>A complete guide to using the Basabari property listing platform</p>
        </header>

        <div class="container-how">

            <div class="section">
                <h3>1. Overview of Basabari</h3>
                <p>
                    Basabari is an online house rental platform designed to connect landlords (property owners) with people
                    who are
                    looking to rent properties. The platform provides a simple and effective way to browse, list, and manage
                    rental
                    properties with full control from both the admin and property owners. Visitors can explore available
                    listings,
                    contact landlords, and filter properties based on city division and price range.
                </p>
            </div>

            <div class="section">
                <h3>2. Homepage Features</h3>
                <p>
                    When users first land on the homepage, they are greeted with a clean layout showcasing featured
                    properties. Each
                    property card displays an image of the house, the price, the number of bedrooms, and the location (e.g.,
                    Gulshan,
                    Dhanmondi). These listings are displayed dynamically from the database.<br><br>
                    A real-time filter/search feature allows users to search houses by division (e.g., Dhaka, Chittagong,
                    etc.) and
                    filter them by price or other features. The homepage is also mobile-friendly and built with modern
                    responsive
                    design principles.
                </p>
            </div>

            <div class="section">
                <h3>3. Registration for Landowners</h3>
                <p>
                    A property owner who wants to list a rental property must first register an account. The registration
                    form requires
                    basic details such as name, email, phone number, and password. Once submitted, the user is saved in the
                    database
                    with a default status of <strong>"Pending Approval"</strong>.<br><br>
                    This ensures that only verified and approved users can access the dashboard and post ads, maintaining
                    platform
                    security and trust.
                </p>
            </div>

            <div class="section">
                <h3>4. Admin Approval Process</h3>
                <p>
                    All newly registered users are not immediately granted access to the admin panel. An administrator must
                    manually
                    review and approve each registration request. The admin has full control to approve or reject users via
                    the backend
                    panel.<br><br>
                    Once a user is approved, they receive login access and become an authenticated landlord who can manage
                    their own
                    listings.
                </p>
            </div>

            <div class="section">
                <h3>5. Login for Landowners</h3>
                <p>
                    After being approved by the admin, the landlord can log in using their email and password. Upon
                    successful login,
                    they are redirected to their own dashboard. This dashboard allows them to create new listings (basha
                    ads), view
                    their active ads, edit or delete listings, and update their profile information.<br><br>
                    This section is fully protected and cannot be accessed by unregistered users or visitors.
                </p>
            </div>

            <div class="section">
                <h3>6. Creating a Basha Ad</h3>
                <p>
                    Landowners can create new house listings using a simple and intuitive form. The form typically includes:
                <ul>
                    <li><b>1.</b> House title</li>
                    <li><b>2.</b> Price</li>
                    <li><b>3.</b> Number of bedrooms and bathrooms</li>
                    <li><b>4.</b> Address/location (e.g., Gulshan, Banani, etc.)</li>
                    <li><b>5.</b> Division and area selection</li>
                    <li><b>6.</b> Image upload</li>
                    <li><b>7.</b> Description or facilities (Wi-Fi, parking, etc.)</li>
                </ul>
                Once the ad is submitted, it appears immediately on the homepage and listings page for users to see.
                </p>
            </div>

            <div class="section">
                <h3>7. Listings Page</h3>
                <p>
                    The listings page is a dedicated page that displays all available basha ads. Unlike the homepage, which
                    may show
                    only featured items, the listings page shows all property ads with pagination or infinite scroll
                    (depending on the
                    setup).<br><br>
                    Each ad contains key details like price, bedroom count, division, and a featured image. Clicking on a
                    property
                    brings up more detailed information.
                </p>
            </div>

            <div class="section">
                <h3>8. Contact Page Functionality</h3>
                <p>
                    The "Contact Us" page allows users to send messages either to the admin or landowner. It contains fields
                    like:
                <ul>
                    <li><b>1.</b> Your Name</li>
                    <li><b>2.</b> Your Email</li>
                    <li><b>3.</b> Subject</li>
                    <li><b>4.</b> Your Message</li>
                </ul>
                When the form is submitted, the message is saved or emailed depending on system configuration. Admins can
                respond
                or take action accordingly.
                </p>
            </div>

            <div class="section">
                <h3>9. Admin Panel Capabilities</h3>
                <p>
                    The admin has full control over the entire platform. Key features include:
                <ul>
                    <li><b>1.</b> View, approve, or reject new landowner registrations</li>
                    <li><b>2.</b> Manage all house listings (edit, delete, or block)</li>
                    <li><b>3.</b> Update or reset user profiles</li>
                    <li><b>4.</b> View contact messages from users</li>
                    <li><b>5.</b> Publish featured properties on the homepage</li>
                </ul>
                This role is essential for keeping the platform safe and up-to-date with verified users and content.
                </p>
            </div>

            <div class="section">
                <h3>10. Responsive Design and Usability</h3>
                <p>
                    The entire Basabari website is built with responsive design in mind. It adapts beautifully across
                    devices—phones,
                    tablets, and desktops. The layout is clean and simple to ensure that even non-technical users can easily
                    register,
                    browse, or list properties.<br><br>
                    Modern frontend technologies like Bootstrap 5, Flexbox, and media queries are used to ensure smooth
                    navigation and
                    performance.
                </p>
            </div>

            <div class="section">
                <h3>11. Future Enhancements (Optional)</h3>
                <p>
                    To make Basabari more powerful, future versions can include:
                <ul>
                    <li><b>1.</b> Payment system for promoting ads</li>
                    <li><b>2.</b> SMS/email notifications</li>
                    <li><b>3.</b> Rating and review system</li>
                    <li><b>4.</b> Google Maps location integration</li>
                    <li><b>5.</b> Chat system between landowner and visitor</li>
                </ul>
                </p>
            </div>

        </div>
    </section>
@endsection
