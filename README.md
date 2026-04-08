# 🚜 Farming Evolution - Smart Farm Management System

[![Laravel Version](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](https://opensource.org/licenses/MIT)

**Farming Evolution** is a comprehensive IoT-ready agricultural management platform designed to digitize the entire farm lifecycle. Developed as a final project for the **Web Technologies** course during the **Bachelor's Degree in Computer Science**, this application provides a centralized dashboard for greenhouse monitoring, crop realization, and supplier logistics.

---

## 👥 Collaboration
This project was developed as a **50/50 paritarian collaboration** by:
* **Elia Felletti** - [GitHub Profile](https://github.com/eliafelletti)
* **Dario Macchi** - [GitHub Profile](https://github.com/darioMacchi)

---

## 🚀 Key Features

### 🌿 Operational Management
- **Greenhouse Monitoring:** Real-time tracking of greenhouse conditions and environmental parameters.
- **Crop Lifecycle:** Full management of cultivation cycles (`Cultivation`) and final harvest tracking (`RealizedCrops`).
- **Resource & Assets:** Administration of agricultural technologies and machinery utilized on-field.
- **Supplier Logistics:** Centralized registry for supplier companies and procurement tracking.

### 🔐 Security & Access Control
- **Role-based Logic:** Secure authentication system for Owners and Staff.
- **Request Management:** Integrated system for handling user requests (`UserRequests`) and permissions.

---

## 📊 Monitored IoT Metrics
The system is architected to process and visualize data from field sensors, focusing on five critical agricultural parameters:

* 🌡️ **Temperature:** Thermal monitoring to prevent heat stress.
* 💧 **Humidity:** Air and soil moisture level tracking.
* 🚿 **Irrigation:** Management of watering cycles and water resources.
* ☁️ **Carbon Dioxide (CO2):** Analysis of gas levels to optimize photosynthesis.
* ☀️ **Luminosity:** Measuring solar exposure (PAR) for optimal plant growth.

---

### 📅 Precision Crop Scheduling
Beyond simple logging, the system implements a **Strategic Calendar** to manage complex agricultural timelines.
- **Lifecycle Tracking:** Integrated visualization of sowing dates, theoretical harvest projections, and actual yield results.
- **Performance Analytics:** Enables a direct visual comparison between planned and actual harvest dates, providing a critical tool for analyzing crop productivity and seasonal variances.

---

## 🛠️ Tech Stack & Architecture
This project follows the **MVC (Model-View-Controller)** design pattern to ensure scalability and clean code separation.

- **Backend:** PHP 8.1 & Laravel 10 (utilizing Sanctum for auth and Guzzle for API interactions).
- **Frontend:** Laravel UI with a responsive Bootstrap.
- **Database:** MySQL with a complex relational schema.
- **Tooling:** Git for version control, Composer for dependency management.

---

### 📂 Project Structure

The repository is organized as follows to ensure a clear separation between documentation, database assets, and the source code:

```text
.
├── Smart_Farm_Application/  # Core Laravel 10 application source code
├── database/                # SQL dumps and database schema scripts
├── docs/                    # Project documentation (Diagrams, Notes, Slides)
│   ├── diagrams/            # ER and Relational models (Draw.io)
│   ├── notes/               # Technical specifications and business logic
│   └── presentation/        # Project slides (PDF and PPTX formats)
├── .gitignore               # Git exclusion rules for environment and vendors
└── README.md                # Main repository documentation and overview
```

---

### 📄 License
This project is for educational use only. All rights to the source code and documentation belong to the authors.
