<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Listings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <h2>Menu</h2>
            <button id="sidebarClose" class="sidebar-close">&times;</button>
        </div>
        <nav class="sidebar-nav">
            <a href="#" class="sidebar-item active" data-tab="home">
                <span class="sidebar-icon">🏠</span>
                <span>Home</span>
            </a>
            <a href="#" class="sidebar-item" data-tab="call">
                <span class="sidebar-icon">📞</span>
                <span>Call</span>
            </a>
            <a href="#" class="sidebar-item" data-tab="about">
                <span class="sidebar-icon">ℹ️</span>
                <span>About</span>
            </a>
            <a href="#" class="sidebar-item" data-tab="admin">
                <span class="sidebar-icon">👤</span>
                <span>Admin</span>
            </a>
            <a href="#" class="sidebar-item" data-tab="settings">
                <span class="sidebar-icon">⚙️</span>
                <span>Settings</span>
            </a>
            <a href="#" class="sidebar-item" data-tab="payment">
                <span class="sidebar-icon">💳</span>
                <span>Payment Method</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Overlay -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <div class="container">
        <header>
            <button id="sidebarToggle" class="sidebar-toggle" title="Open menu">
                ☰
            </button>
            <h1>🏠 Real Estate Listings</h1>
            <p class="subtitle">Find your perfect property</p>
            <div class="header-actions">
                <button id="signUpBtn" class="auth-btn signup-btn">Sign Up</button>
                <button id="loginBtn" class="auth-btn login-btn" style="display: none;">Login</button>
                <button id="themeToggle" class="theme-toggle" title="Toggle dark mode">
                    🌙
                </button>
            </div>
        </header>

        <div class="search-section">
            <div class="search-container">
                <input 
                    type="text" 
                    id="searchInput" 
                    class="search-input" 
                    placeholder="Search by location, price, or type..."
                    autocomplete="off"
                >
                <button id="searchBtn" class="search-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    Search
                </button>
            </div>
            <div class="filter-container">
                <select id="typeFilter" class="filter-select">
                    <option value="">All Types</option>
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                    <option value="villa">Villa</option>
                </select>
                <select id="priceFilter" class="filter-select">
                    <option value="">All Prices</option>
                    <option value="0-300000">Under $300k</option>
                    <option value="300000-500000">$300k - $500k</option>
                    <option value="500000-800000">$500k - $800k</option>
                    <option value="800000+">Above $800k</option>
                </select>
                <select id="sortSelect" class="filter-select" title="Sort results">
                    <option value="">Sort: Relevance</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                    <option value="beds-desc">Bedrooms: Most to Least</option>
                    <option value="sqft-desc">Size: Large to Small</option>
                </select>
                <button id="favoritesTab" class="favorites-tab" title="Show favorites">
                    ❤️ Favorites (<span id="favoritesCount">0</span>)
                </button>
            </div>
        </div>

        <div class="main-content">
            <div class="listings-panel">
                <h2>Properties (<span id="propertyCount">0</span>)</h2>
                <div id="propertiesList" class="properties-list">
                    <!-- Properties will be dynamically loaded here -->
                </div>
            </div>

            <div class="map-container">
                <div id="map"></div>
                <button id="mapViewToggle" class="map-view-toggle" title="Toggle Aerial View">
                    🛰️ Satellite
                </button>
            </div>
        </div>
    </div>

    <div id="propertyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalBody"></div>
        </div>
    </div>

    <!-- Sign Up Modal -->
    <div id="signUpModal" class="auth-modal">
        <div class="auth-modal-content">
            <span class="auth-close" data-modal="signUpModal">&times;</span>
            <h2>Create Account</h2>
            <form id="signUpForm" class="auth-form">
                <div class="form-group">
                    <input type="text" id="signUpName" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="email" id="signUpEmail" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" id="signUpPassword" placeholder="Password" required minlength="6">
                </div>
                <div class="form-group">
                    <input type="password" id="signUpConfirmPassword" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="auth-submit-btn">Sign Up</button>
                <p class="auth-switch">
                    Already have an account? <a href="#" id="switchToLogin">Login</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="auth-modal">
        <div class="auth-modal-content">
            <span class="auth-close" data-modal="loginModal">&times;</span>
            <h2>Login</h2>
            <form id="loginForm" class="auth-form">
                <div class="form-group">
                    <input type="email" id="loginEmail" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" id="loginPassword" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <a href="#" id="forgotPasswordLink" class="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit" class="auth-submit-btn">Login</button>
                <p class="auth-switch">
                    Don't have an account? <a href="#" id="switchToSignUp">Sign Up</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div id="forgotPasswordModal" class="auth-modal">
        <div class="auth-modal-content">
            <span class="auth-close" data-modal="forgotPasswordModal">&times;</span>
            <h2>Forgot Password</h2>
            <p class="auth-description">Enter your email address and we'll send you a link to reset your password.</p>
            <form id="forgotPasswordForm" class="auth-form">
                <div class="form-group">
                    <input type="email" id="forgotPasswordEmail" placeholder="Email Address" required>
                </div>
                <button type="submit" class="auth-submit-btn">Send Reset Link</button>
                <p class="auth-switch">
                    Remember your password? <a href="#" id="switchToLoginFromForgot">Login</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div id="resetPasswordModal" class="auth-modal">
        <div class="auth-modal-content">
            <span class="auth-close" data-modal="resetPasswordModal">&times;</span>
            <h2>Reset Password</h2>
            <p class="auth-description">Enter your new password below.</p>
            <form id="resetPasswordForm" class="auth-form">
                <div class="form-group">
                    <input type="password" id="resetPasswordNew" placeholder="New Password" required minlength="6">
                </div>
                <div class="form-group">
                    <input type="password" id="resetPasswordConfirm" placeholder="Confirm New Password" required>
                </div>
                <button type="submit" class="auth-submit-btn">Reset Password</button>
            </form>
        </div>
    </div>

    <!-- Logged In Homepage (Hidden by default) -->
    <div id="loggedInHomepage" class="logged-in-homepage" style="display: none;">
        <div class="logged-in-header">
            <h1>Welcome back, <span id="userName">User</span>! 👋</h1>
            <button id="logoutBtn" class="logout-btn">Logout</button>
        </div>
        <div class="logged-in-content">
            <div class="welcome-card">
                <h2>Dashboard</h2>
                <p>You're successfully logged in to your account.</p>
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <h3>Saved Properties</h3>
                        <p id="savedPropertiesCount">0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Recent Searches</h3>
                        <p>0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Messages</h3>
                        <p>0</p>
                    </div>
                </div>
            </div>
            <div class="quick-actions">
                <h2>Quick Actions</h2>
                <div class="action-buttons">
                    <button class="action-btn" id="browsePropertiesBtn">
                        Browse Properties
                    </button>
                    <button class="action-btn" id="contactUsBtn">
                        Contact Us
                    </button>
                    <button class="action-btn" id="settingsBtn">
                        Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Content Panels -->
    <div id="sidebarContent" class="sidebar-content">
        <div id="homePanel" class="sidebar-panel active">
            <!-- Home content - default view -->
        </div>
        <div id="callPanel" class="sidebar-panel">
            <h2>📞 Contact Us</h2>
            <div class="panel-content">
                <p><strong>Phone:</strong> <a href="tel:+1234567890">+1 (234) 567-890</a></p>
                <p><strong>Email:</strong> <a href="mailto:info@realestate.com">info@realestate.com</a></p>
                <p><strong>Office Hours:</strong> Monday - Friday, 9 AM - 6 PM</p>
                <div class="contact-form">
                    <h3>Send us a message</h3>
                    <form>
                        <input type="text" placeholder="Your Name" required>
                        <input type="email" placeholder="Your Email" required>
                        <textarea placeholder="Your Message" rows="4" required></textarea>
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="aboutPanel" class="sidebar-panel">
            <h2>ℹ️ About Us</h2>
            <div class="panel-content">
                <p>Welcome to Real Estate Listings, your trusted partner in finding the perfect property.</p>
                <h3>Our Mission</h3>
                <p>We aim to provide exceptional real estate services with transparency, integrity, and customer satisfaction at the heart of everything we do.</p>
                <h3>Our Services</h3>
                <ul>
                    <li>Property Listings</li>
                    <li>Property Valuation</li>
                    <li>Real Estate Consultation</li>
                    <li>Property Management</li>
                </ul>
                <h3>Why Choose Us?</h3>
                <ul>
                    <li>Extensive Property Database</li>
                    <li>Expert Real Estate Agents</li>
                    <li>Competitive Pricing</li>
                    <li>24/7 Customer Support</li>
                </ul>
            </div>
        </div>
        <div id="adminPanel" class="sidebar-panel">
            <h2>👤 Admin Panel</h2>
            <div class="panel-content">
                <div class="admin-section">
                    <h3>Property Management</h3>
                    <button class="admin-btn">Add New Property</button>
                    <button class="admin-btn">Edit Properties</button>
                    <button class="admin-btn">View All Properties</button>
                </div>
                <div class="admin-section">
                    <h3>User Management</h3>
                    <button class="admin-btn">View Users</button>
                    <button class="admin-btn">Manage Permissions</button>
                </div>
                <div class="admin-section">
                    <h3>Analytics</h3>
                    <button class="admin-btn">View Reports</button>
                    <button class="admin-btn">Export Data</button>
                </div>
            </div>
        </div>
        <div id="settingsPanel" class="sidebar-panel">
            <h2>⚙️ Settings</h2>
            <div class="panel-content">
                <div class="settings-section">
                    <h3>Appearance</h3>
                    <label class="settings-label">
                        <span>Dark Mode</span>
                        <input type="checkbox" id="settingsDarkMode">
                    </label>
                    <label class="settings-label">
                        <span>Font Size</span>
                        <select id="fontSizeSelect">
                            <option value="small">Small</option>
                            <option value="medium" selected>Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </label>
                </div>
                <div class="settings-section">
                    <h3>Notifications</h3>
                    <label class="settings-label">
                        <span>Email Notifications</span>
                        <input type="checkbox" checked>
                    </label>
                    <label class="settings-label">
                        <span>SMS Notifications</span>
                        <input type="checkbox">
                    </label>
                </div>
                <div class="settings-section">
                    <h3>Privacy</h3>
                    <button class="settings-btn">Privacy Policy</button>
                    <button class="settings-btn">Terms of Service</button>
                    <button class="settings-btn">Data Export</button>
                </div>
            </div>
        </div>
        <div id="paymentPanel" class="sidebar-panel">
            <h2>💳 Payment Methods</h2>
            <div class="panel-content">
                <div class="payment-methods">
                    <div class="payment-card">
                        <h3>Credit/Debit Card</h3>
                        <p>Visa, Mastercard, American Express</p>
                        <button class="payment-btn">Add Card</button>
                    </div>
                    <div class="payment-card">
                        <h3>PayPal</h3>
                        <p>Pay securely with PayPal</p>
                        <button class="payment-btn">Connect PayPal</button>
                    </div>
                    <div class="payment-card">
                        <h3>Bank Transfer</h3>
                        <p>Direct bank transfer</p>
                        <button class="payment-btn">Add Account</button>
                    </div>
                </div>
                <div class="payment-history">
                    <h3>Payment History</h3>
                    <p>No recent transactions</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAObTqAvjvuIk_VEGi6GsGt-NdPCQMyLlE&callback=initMap" async defer></script>
    <script src="script.js"></script>
</body>
</html>
