const dropzone = document.getElementById("dropzone");
        const row1 = document.getElementById("row-1");
        const row2 = document.getElementById("row-2");

        dropzone.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropzone.style.border = "2px dashed #007bff";
        });

        dropzone.addEventListener("dragleave", () => {
            dropzone.style.border = "2px dashed #ccc";
        });

        dropzone.addEventListener("drop", (e) => {
            e.preventDefault();
            dropzone.style.border = "2px dashed #ccc";

            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        dropzone.addEventListener("click", () => {
            document.getElementById("fileInput").click();
        });

        document.getElementById("fileInput").addEventListener("change", (e) => {
            const files = e.target.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            row1.innerHTML += "";
            row2.innerHTML += "";

            for (const file of files) {
                const cell = document.createElement("td");

                if (file.type.startsWith("image/")) {
                    const thumbnail = document.createElement("img");
                    thumbnail.src = URL.createObjectURL(file);
                    thumbnail.classList.add("img-thumbnail");
                    cell.appendChild(thumbnail);
                }

                // Agregar celdas a la fila correspondiente
                if (row1.childElementCount < 4) {
                    row1.appendChild(cell);
                } else {
                    row2.appendChild(cell);
                }
            }
        }