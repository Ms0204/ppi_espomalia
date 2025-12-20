# Fundamentos Teóricos Asumidos para el Desarrollo de la Práctica

## 1. Metodología Ágil

### SCRUM: Roles, Producto Backlog, Historia de Usuario

**Término:** SCRUM

**Concepto:** SCRUM es un marco de trabajo ágil que fomenta la entrega iterativa de software mediante iteraciones cortas llamadas sprints. Organiza el desarrollo en roles específicos (Product Owner, Scrum Master, equipo de desarrollo), utiliza un Producto Backlog priorizado y artefactos como el Sprint Backlog para mantener la visibilidad y transparencia del proyecto. Las historias de usuario representan requisitos funcionales desde la perspectiva del usuario final.

**Aplicación en el proyecto PPI:** El sistema de gestión de inventarios se desarrolló bajo principios ágiles, descomponiendo requisitos en historias de usuario tales como "Como administrador, necesito registrar nuevos productos" y "Como usuario, puedo consultar el historial de ingresos y egresos". Las iteraciones se enfocaron en módulos funcionales: autenticación, gestión de productos, inventarios, ingresos/egresos, y reportes, permitiendo retroalimentación temprana y correcciones en cada ciclo.

**Referencias bibliográficas:**
- Schwaber, K., & Sutherland, J. (2020). *The Scrum Guide*. Scrum.org.
- Cohn, M. (2004). *User Stories Applied: For Agile Software Development*. Addison-Wesley.
- Rubin, K. S. (2012). *Essential Scrum: A Practical Guide to the Most Popular Agile Process*. Addison-Wesley.

---

## 2. Calidad y Pruebas de Software

### Test (Unitarios, Integración, E2E)

**Término:** Pruebas de Software (Test unitarios, integración, end-to-end)

**Concepto:** Las pruebas de software garantizan la calidad y funcionamiento correcto de la aplicación. Las pruebas unitarias validan componentes aislados; las de integración verifican la interacción entre módulos; las pruebas end-to-end (E2E) simulan escenarios completos del usuario. Conjunto estructurado de validaciones que detectan regresiones, errores lógicos y comportamientos inesperados antes de la producción.

**Aplicación en el proyecto PPI:** Se ejecutaron pruebas end-to-end sobre flujos críticos: creación/edición/eliminación de productos, registros de ingresos y egresos, búsqueda y paginación. Se realizaron validaciones de migración limpia con `php artisan migrate:fresh` para detectar inconsistencias de esquema y relaciones entre tablas (productos, inventarios, usuarios, ingresos, egresos). Las pruebas funcionales confirmaron que formularios con CSRF, validaciones de entrada y mapeo de columnas funcionaran correctamente tras cambios de base de datos.

**Referencias bibliográficas:**
- Myers, G. J., Sandler, C., & Badgett, T. (2011). *The Art of Software Testing* (3rd ed.). John Wiley & Sons.
- Fowler, M. (2015). *Refactoring: Improving the Design of Existing Code*. Addison-Wesley.
- Beck, K. (2002). *Test Driven Development: By Example*. Addison-Wesley.

---

## 3. Diseño de Interfaz de Usuario

### Diseño de Interfaces o Prototipado de Interfaces

**Término:** Diseño de Interfaces / Prototipado de Interfaces

**Concepto:** Disciplina que aborda la creación de experiencias interactivas visuales y funcionales. El diseño de interfaces incluye disposición de elementos, tipografía, paleta de colores y patrones de interacción que facilitan la usabilidad. El prototipado es la creación de versiones preliminares (wireframes, mockups, prototipos interactivos) que permiten validación temprana con usuarios y stakeholders, reduciendo riesgos de desarrollo.

**Aplicación en el proyecto PPI:** El sistema utilizó Bootstrap 5 para crear una interfaz responsiva y consistente con: navegación lateral con menú de acceso a módulos (usuarios, inventarios, productos, ingresos, egresos, reportes, roles, permisos), tablas paginadas con búsqueda y filtrado, modales para operaciones CRUD, alertas de confirmación para acciones destructivas, e iconografía Font Awesome para mejorar UX. El diseño unificado en `css/styles.css` aseguró coherencia visual y accesibilidad básica, permitiendo que usuarios operacionales interactúen con flujos intuitivos sin fricción.

**Referencias bibliográficas:**
- Nielsen, J., & Norman, D. A. (2014). *The Definition of User Experience (UX)*. Nielsen Norman Group.
- Lauer, D. A., & Pentak, S. (2011). *Design Basics* (8th ed.). Cengage Learning.
- Rosson, M. B., & Carroll, J. M. (2002). *Usability Engineering: Scenario-Based Development of Human-Computer Interaction*. Morgan Kaufmann.

---

## 4. Arquitectura y Patrones de Diseño de Software

### MVC (Patrón de Diseño)

**Término:** MVC (Model-View-Controller)

**Concepto:** Patrón arquitectónico que separa la aplicación en tres capas: Model (lógica de datos y negocio), View (presentación e interfaz de usuario) y Controller (orquestación de peticiones y flujos). Esta separación favorece modularidad, reutilización, testabilidad y mantenibilidad, permitiendo que equipos trabajen sobre capas de forma independiente.

**Aplicación en el proyecto PPI:** La aplicación Laravel implementa MVC mediante: (1) **Models** (`Productos.php`, `Ingresos.php`, `Egresos.php`, `Usuarios.php`, etc.) que definen relaciones Eloquent, validaciones y lógica de negocio; (2) **Views** (plantillas Blade en `resources/views/`) que renderizan tablas, modales CRUD y formularios con diseño Bootstrap responsivo; (3) **Controllers** (`ProductoController`, `IngresoController`, `EgresoController`, etc.) que procesan peticiones HTTP, validan datos y coordinan operaciones CRUD. Esta separación permitió mantener código limpio, facilitar mantenimiento y escalar funcionalidades sin afectar otras capas.

**Referencias bibliográficas:**
- Gamma, E., Helm, R., Johnson, R., & Vlissides, J. (1994). *Design Patterns: Elements of Reusable Object-Oriented Software*. Addison-Wesley.
- Fowler, M. (2006). *Patterns of Enterprise Application Architecture*. Addison-Wesley.
- Bass, L., Clements, P., & Kazman, R. (2012). *Software Architecture in Practice* (3rd ed.). Addison-Wesley.

---

### Arquitectura Cliente-Servidor

**Término:** La aplicación Laravel implementa MVC mediante: (1) **Models** (`Productos.php`, `Ingresos.php`, `Egresos.php`, `Usuarios.php`, etc.) que definen relaciones Eloquent, validaciones y lógica de negocio; (2) **Views** (plantillas Blade en `resources/views/`) que renderizan tablas, modales CRUD y formularios con diseño Bootstrap responsivo; (3) **Controllers** (`ProductoController`, `IngresoController`, `EgresoController`, etc.) que procesan peticiones HTTP, validan datos y coordinan operaciones CRUD. Esta separación permitió mantener código limpio, facilitar mantenimiento y escalar funcionalidades sin afectar otras capas.

**Referencias bibliográficas:**
- Tanenbaum, A. S., & Van Steen, M. (2006). *Distributed Systems: Principles and Paradigms* (2nd ed.). Prentice Hall.
- Newman, S. (2015). *Building Microservices*. O'Reilly Media.
- Coulouris, G. F., Dollimore, J., Kindberg, T., & Blair, G. (2011). *Distributed Systems: Concepts and Design* (5th ed.). Addison-Wesley.

---

## 5. Herramientas de Desarrollo

### Editor de Código

**Término:** Editor de Código

**Concepto:** Herramienta de software que permite escribir, editar y organizar código fuente. Características como resaltado de sintaxis, autocompletado, depuración integrada y control de versiones facilitan la productividad y precisión del desarrollador. Ejemplos: Visual Studio Code, JetBrains IntelliJ, Sublime Text.

**Referencias bibliográficas:**
- Sommerville, I. (2015). *Software Engineering* (10th ed.). Addison-Wesley.
- McDowell, G. L. (2015). *Cracking the Coding Interview* (6th ed.). CareerCup.

---

## 6. Lenguajes de Programación

### Lenguaje de Programación

**Término:** Lenguaje de Programación

**Concepto:** Sistema formal de comunicación que permite expresar algoritmos e instrucciones que las máquinas pueden ejecutar. Los lenguajes pueden ser de alto nivel (cercano al lenguaje natural, como Python, PHP, JavaScript) o bajo nivel (cercano al código máquina). Cada lenguaje tiene semántica, sintaxis y paradigmas específicos (imperativo, funcional, orientado a objetos).

**Referencias bibliográficas:**
- Sebesta, R. W. (2015). *Concepts of Programming Languages* (11th ed.). Pearson.
- Turing, A. (1936). *On Computable Numbers, with an Application to the Entscheidungsproblem*. Proceedings of the London Mathematical Society.
- Stroustrup, B. (2013). *The C++ Programming Language* (4th ed.). Addison-Wesley.

---

## 7. Frameworks Web

### Framework Web

**Término:** Framework Web

**Concepto:** Conjunto estructurado de librerías, herramientas, patrones y convenciones que acelera el desarrollo de aplicaciones web. Proporciona componentes preconstructidos (routing, ORM, autenticación, validación) que reducen código repetitivo y favorecen buenas prácticas. Ejemplos: Laravel, Django, Spring Boot, Express.js.

**Aplicación en el proyecto PPI:** Laravel fue seleccionado como framework por su ecosistema maduro, Eloquent ORM expresivo y Blade templating. El framework proporciona: routing automático (`routes/web.php`), migraciones versionadas para esquema, middleware para autenticación y sanitización, validación integrada, y herramientas Artisan para CLI. Estas capacidades permitieron desarrollo rápido y seguro de módulos (CRUD de productos, ingresos, egresos) sin reimplementar infraestructura común.

**Referencias bibliográficas:**
- Larsen, R. (2017). *Learning Laravel*. Packt Publishing.
- Sommerville, I. (2015). *Software Engineering* (10th ed.). Addison-Wesley.
- McConnell, S. (2004). *Code Complete* (2nd ed.). Microsoft Press.

---

## 8. Herramientas de Inteligencia Artificial

### Copilot

**Término:** Copilot (Asistente de IA para Programación)

**Concepto:** Herramienta de inteligencia artificial que asiste al desarrollador en la escritura de código mediante sugerencias automáticas, autocompletado contextual y generación de fragmentos basados en patrones y descripción en lenguaje natural. Integrada en editores como Visual Studio Code, mejora productividad al reducir tiempo de escritura repetitiva y proporciona ejemplos de sintaxis y patrones comunes.

**Referencias bibliográficas:**
- Chen, M., Tworek, J., Jun, H., Yuan, Q., et al. (2021). *Evaluating Large Language Models Trained on Code*. arXiv preprint arXiv:2107.03374.
- OpenAI. (2021). *Codex: A Foundation Model for Programming*. OpenAI Blog.

---

## 9. Seguridad en Aplicaciones Web

### Seguridad Aplicaciones Web (Concepto)

**Término:** Seguridad en Aplicaciones Web

**Concepto:** Conjunto de prácticas, estándares y controles destinados a proteger aplicaciones web contra amenazas y vulnerabilidades. Abarca autenticación, autorización, cifrado de comunicaciones, validación de entrada, gestión de sesiones, prevención de inyecciones y protección contra ataques de negación de servicio. Busca garantizar confidencialidad, integridad y disponibilidad de datos e información.

**Referencias bibliográficas:**
- OWASP (Open Web Application Security Project). (2021). *OWASP Top 10 - 2021: The Ten Most Critical Web Application Security Risks*.
- Stuttard, D., & Pinto, M. (2011). *The Web Application Hacker's Handbook: Finding and Exploiting Security Flaws* (2nd ed.). John Wiley & Sons.
- Harris, S. (2016). *CISSP All-in-One Exam Guide* (6th ed.). McGraw-Hill.

---

### Cross-Site Request Forgery (CSRF)

**Término:** Cross-Site Request Forgery (CSRF)

**Concepto:** Vulnerabilidad de seguridad en la cual un atacante engaña a un usuario autenticado para que realice acciones no deseadas en una aplicación web. El atacante crea solicitudes forjadas desde un sitio malicioso hacia la aplicación objetivo, aprovechando la sesión válida del usuario. La protección incluye tokens sincronizados (CSRF tokens) que validan que la solicitud proviene del sitio legítimo.

**Aplicación en el proyecto PPI:** Se implementó protección CSRF en todos los formularios mediante directivas `@csrf` en Blade (login, creación/edición de usuarios, productos, ingresos, egresos, inventarios, etc.) y meta-token en cabeceras HTML (`<meta name="csrf-token" content="{{ csrf_token() }}">`) para futuras peticiones AJAX. Esta medida previene solicitudes forjadas desde sitios maliciosos, garantizando que solo peticiones legítimas del navegador del usuario sean procesadas.

**Referencias bibliográficas:**
- OWASP. (2021). *Cross-Site Request Forgery (CSRF)*. OWASP Foundation.
- Zalewski, M. (2012). *The Tangled Web: A Guide to Securing Modern Web Applications*. No Starch Press.
- Stuttard, D., & Pinto, M. (2011). *The Web Application Hacker's Handbook* (2nd ed.). John Wiley & Sons.

---

### Cross-Site Scripting (XSS)

**Término:** Cross-Site Scripting (XSS)

**Concepto:** Vulnerabilidad que permite inyectar código JavaScript malicioso en las páginas web vistas por otros usuarios. Existen tres tipos: Stored (almacenado en BD), Reflected (reflejado en URL) y DOM-based (manipulación del modelo de objeto). La prevención incluye validación de entrada, escape de salida y Content Security Policy (CSP).

**Aplicación en el proyecto PPI:** Se implementó un middleware `SanitizeInput` que sanitiza automáticamente todas las entradas (trim, strip_tags) antes de procesar. Las vistas Blade utilizan el escape por defecto (`{{ $variable }}`) en lugar de renderización sin escape (`{!! !!}`), evitando inyección de scripts en tablas, modales y reportes. Las validaciones en controladores rechazan datos malformados, y los campos sensibles (nombres, descripciones) son validados estrictamente, reduciendo la superficie de ataque XSS.

**Referencias bibliográficas:**
- OWASP. (2021). *Cross-Site Scripting (XSS)*. OWASP Foundation.
- Stuttard, D., & Pinto, M. (2011). *The Web Application Hacker's Handbook* (2nd ed.). John Wiley & Sons.
- Zalewski, M. (2012). *The Tangled Web: A Guide to Securing Modern Web Applications*. No Starch Press.

---

## 10. Integración y Despliegue Continuo

### CI/CD (Continuous Integration / Continuous Deployment)

**Término:** CI/CD (Integración Continua / Despliegue Continuo)

**Concepto:** Prácticas de automatización que buscan reducir tiempo y riesgos en la entrega de software. Integración continua (CI) automatiza compilación, pruebas y validaciones cada vez que hay cambios en código. Despliegue continuo (CD) automatiza la publicación en ambientes de prueba y producción. Ambas prácticas favorecen feedback rápido, detección temprana de defectos y liberaciones frecuentes.

**Aplicación en el proyecto PPI:** El proyecto se despliega en Render, plataforma que integra CI/CD nativo desde repositorio GitHub. Cada push a la rama principal dispara: build automático, ejecución de migraciones con `php artisan migrate`, y deployment en ambiente productivo. Este flujo asegura que cambios de esquema (nuevas columnas, relaciones, índices) se apliquen consistentemente sin intervención manual, reduciendo errores de sincronización y facilitando iteraciones rápidas.

**Referencias bibliográficas:**
- Humble, J., & Farley, D. (2010). *Continuous Delivery: Reliable Software Releases through Build, Test, and Deployment Automation*. Addison-Wesley.
- Forsgren, N., Humble, J., & Kim, G. (2018). *Accelerate: The Science of Lean Software and DevOps*. IT Revolution Press.
- Bass, L., Clements, P., & Kazman, R. (2012). *Software Architecture in Practice* (3rd ed.). Addison-Wesley.

---

## 11. Operaciones y Despliegue

### Despliegue

**Término:** Despliegue (Deployment)

**Concepto:** Proceso de liberación y puesta en marcha de una aplicación en ambientes de prueba o producción. Incluye instalación de dependencias, configuración de variables de entorno, migración de datos, ejecución de tests de sanidad y monitoreo. Un despliegue exitoso asegura que la aplicación funcione correctamente en el ambiente destino.

**Referencias bibliográficas:**
- Humble, J., & Farley, D. (2010). *Continuous Delivery: Reliable Software Releases*. Addison-Wesley.
- Newman, S. (2015). *Building Microservices*. O'Reilly Media.
- Sommerville, I. (2015). *Software Engineering* (10th ed.). Addison-Wesley.

---

## 12. Cloud Computing

### Cloud Computing

**Término:** Cloud Computing (Computación en la Nube)

**Concepto:** Modelo de prestación de servicios informáticos (cómputo, almacenamiento, bases de datos, redes) a través de Internet bajo demanda. Ofrece escalabilidad, flexibilidad, reducción de costos operativos y eliminación de infraestructura on-premise. Modelos: IaaS (Infrastructure), PaaS (Platform), SaaS (Software).

**Referencias bibliográficas:**
- Mell, P., & Grance, T. (2011). *The NIST Definition of Cloud Computing*. U.S. National Institute of Standards and Technology (NIST).
- Armbrust, M., Fox, A., Griffith, R., et al. (2010). *A View of Cloud Computing*. Communications of the ACM, 53(4), 50-58.
- Buyya, R., Broberg, J., & Goscinski, A. M. (2010). *Cloud Computing: Principles and Paradigms*. John Wiley & Sons.

---

### Koyeb (Plataforma Cloud)

**Término:** Koyeb

**Concepto:** Plataforma cloud moderna que ofrece hosting, despliegue automatizado y scaling de aplicaciones web. Soporta múltiples lenguajes y frameworks, integra CI/CD nativo, proporciona SSL/TLS, dominio personalizado y base de datos gestionada. Enfocada en desarrollo ágil y despliegue sin fricción.

**Referencias bibliográficas:**
- Koyeb. (2024). *Koyeb Documentation*. Koyeb Inc. https://www.koyeb.com/docs/
- Foreman, S. (2020). *Modern DevOps: How to Scale Systems Sustainably and Reliably*. Packt Publishing.

---

### Render (Plataforma Cloud)

**Término:** Render

**Concepto:** Plataforma cloud para despliegue, hosting y gestión de aplicaciones web, bases de datos y servicios de fondo. Integra despliegue automático desde repositorios Git, escalado horizontal, SSL gratuito, variables de entorno seguras y servicios adicionales (PostgreSQL, Redis). Simplifica operaciones eliminando complejidad de infraestructura.

**Aplicación en el proyecto PPI:** Se utilizó Render para alojar la aplicación Laravel y la base de datos PostgreSQL en producción. Variables de entorno (credenciales de BD, claves de sesión) se gestionan de forma segura sin exponerlas en código. El despliegue automático desde Git simplifica la publicación de nuevas versiones; la integración con Render Postgres garantiza respaldos automáticos y disponibilidad 24/7, eliminando complejidad operativa y permitiendo enfoque en desarrollo de funcionalidades.

**Referencias bibliográficas:**
- Render. (2024). *Render Docs*. Render Inc. https://render.com/docs/
- Forsgren, N., Humble, J., & Kim, G. (2018). *Accelerate: The Science of Lean Software and DevOps*. IT Revolution Press.

---

## 13. Bases de Datos

### SGBD (Sistema de Gestión de Bases de Datos)

**Término:** SGBD (Sistema de Gestión de Bases de Datos)

**Concepto:** Software que gestiona, almacena, recupera y manipula datos de forma eficiente y segura. Proporciona lenguajes de consulta (SQL), mecanismos de control de concurrencia, transacciones ACID, indexación y respaldo. Tipos: relacionales (PostgreSQL, MySQL, Oracle), NoSQL (MongoDB, Redis), o en tiempo real (Firebase). Garantiza integridad, disponibilidad y confidencialidad de datos.

**Aplicación en el proyecto PPI:** PostgreSQL fue seleccionado como SGBD para garantizar integridad referencial y transacciones ACID. Las tablas `productos`, `inventarios`, `usuarios`, `ingresos` y `egresos` se relacionan mediante claves foráneas (`idProducto`, `codigoInventario`, `idCategoria`, etc.) asegurando consistencia. Las migraciones Laravel (versionadas) permiten evolucionar el esquema de forma controlada; queries con Eloquent ORM facilitan consultas complejas (búsquedas, paginación, reportes). Transacciones protegen operaciones críticas; índices optimizan performance en consultas frecuentes.

**Referencias bibliográficas:**
- Silberschatz, A., Korth, H. F., & Sudarshan, S. (2019). *Database System Concepts* (7th ed.). McGraw-Hill.
- Elmasri, R., & Navathe, S. B. (2016). *Fundamentals of Database Systems* (7th ed.). Pearson.
- Garcia-Molina, H., Ullman, J. D., & Widom, J. (2008). *Database Systems: The Complete Book* (2nd ed.). Prentice Hall.

---

## Conclusión

Los fundamentos teóricos y herramientas mencionados constituyen el andamiaje sobre el cual se sustenta el desarrollo de la práctica PPI. La integración de metodologías ágiles, patrones de diseño, prácticas de seguridad, infraestructura cloud y herramientas modernas de desarrollo permite construir aplicaciones web confiables, escalables y seguras que responden a necesidades operativas reales de la institución.

---

**Nota:** Las referencias bibliográficas se alinean con estándares académicos internacionales y prácticas de la industria del software a la fecha de elaboración del documento.
