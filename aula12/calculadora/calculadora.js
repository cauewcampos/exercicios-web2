let currentInput = "";
let memory = 0;
let operator = null;

function press(num) {
    currentInput += num;
    updateDisplay(currentInput);
}

function clearDisplay() {
    currentInput = "";
    updateDisplay(0);
}

function updateDisplay(value) {
    document.getElementById("display").innerText = value;
}

function calculate(op) {
    operator = op;
    memory = parseFloat(currentInput);
    currentInput = "";
}

function calculateResult() {
    let result;
    const currentNumber = parseFloat(currentInput);

    if (operator === '+') {
        result = memory + currentNumber;
    } else if (operator === '-') {
        result = memory - currentNumber;
    } else if (operator === '*') {
        result = memory * currentNumber;
    } else if (operator === '/') {
        result = memory / currentNumber;
    } else if (operator === 'sqrt') {
        result = Math.sqrt(currentNumber);
    }

    updateDisplay(result);
    currentInput = result.toString();
    operator = null;
}

function memoryRead() {
    fetch('mr.php')
        .then(response => response.json())
        .then(data => {
            memory = data.valor;
            updateDisplay(memory);
        })
        .catch(error => console.error("Erro ao ler memória:", error));
}

function memoryClear() {
    fetch('mc.php')
        .then(response => response.json())
        .then(data => {
            memory = 0;
            updateDisplay(0);
        })
        .catch(error => console.error("Erro ao limpar memória:", error));
}

function memoryAdd() {
    let valor = parseFloat(currentInput);
    fetch(`mplus.php?valor=${valor}`)
        .then(response => response.json())
        .then(data => {
            memory = data.valor;
            updateDisplay(memory);
        })
        .catch(error => console.error("Erro ao adicionar à memória:", error));
}

function memorySubtract() {
    let valor = parseFloat(currentInput);
    fetch(`mminus.php?valor=${valor}`)
        .then(response => response.json())
        .then(data => {
            memory = data.valor;
            updateDisplay(memory);
        })
        .catch(error => console.error("Erro ao subtrair da memória:", error));
}

function calculate(op) {
    operator = op;
    memory = parseFloat(currentInput);
    currentInput = "";
}