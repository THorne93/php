<style>
    .container {
        padding-left: 50px;
        display: flex;
        align-items: flex-start;
        gap: 30px;
    }
    .container img {
        flex-shrink: 0; /* Prevents the image from shrinking */
    }
    img {
        border: 1px solid black;
        border-collapse: collapse;
        margin-right: 50px;
    }
    span {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
    }
    h1 {
        margin: 0;
        flex-grow: 1;
    }
    .button-group {
        margin-left: 50px;
        display: inline-flex;
        gap: 10px;
    }
    .parent {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows:repeat(5, 1fr);
        grid-column-gap: 10px;
        grid-row-gap: 50px;
    }

</style>