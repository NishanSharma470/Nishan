
<style>
    .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    background-color: #f0f0f0; /* Optional background color for the full-screen container */
}

.centered-content {
    display: flex;
    justify-content: space-between;
    max-width: 800px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Optional: Add a shadow for container */
}

.left-div,
.right-div {
    flex: 1; /* Allow both left and right divs to grow and take equal space */
    border: 1px solid #ccc;
    padding: 20px;
    box-sizing: border-box;
}

</style>


<body>
    <div class="container">
        <div class="centered-content">
            <div class="left-div">
            <img src="/images/real-estate-agent-2-1024x683.webp" alt="Image Description"style="width: 50%; height: auto;">
            </div>
            <div class="right-div">
                <!-- Content for the right div -->
                <h2>Be agent for websites</h2>
                <p>This is the content of the right div.</p>
            </div>
        </div>
    </div>
</body>