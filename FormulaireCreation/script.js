const strengthInput = document.getElementsByName("str")[0];
const dexterityInput = document.getElementsByName("dex")[0];
const constitutionInput = document.getElementsByName("con")[0];
const intelligenceInput = document.getElementsByName("int")[0];
const wisdomInput = document.getElementsByName("wis")[0];
const charismaInput = document.getElementsByName("cha")[0];

document.addEventListener('DOMContentLoaded', function() {
  updateModifier("str", strengthInput.value);
});

document.getElementsByName("str")[0].nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("str")[0].value);
  if (currentValue < 20) {
    document.getElementsByName("str")[0].value = currentValue + 1;
    updateModifier("str", document.getElementsByName("str")[0].value);
  }
});

document.getElementsByName("str")[0].nextElementSibling.nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("str")[0].value);
  if (currentValue > 8) {
    document.getElementsByName("str")[0].value = currentValue - 1;
    updateModifier("str", document.getElementsByName("str")[0].value);
  }
});
/////////////////////////////////////////

document.addEventListener('DOMContentLoaded', function() {
  updateModifier("dex", strengthInput.value);
});

document.getElementsByName("dex")[0].nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("dex")[0].value);
  if (currentValue < 20) {
    document.getElementsByName("dex")[0].value = currentValue + 1;
    updateModifier("dex", document.getElementsByName("dex")[0].value);
  }
});

document.getElementsByName("dex")[0].nextElementSibling.nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("dex")[0].value);
  if (currentValue > 8) {
    document.getElementsByName("dex")[0].value = currentValue - 1;
    updateModifier("dex", document.getElementsByName("dex")[0].value);
  }
});
/////////////////////////////////////////

document.addEventListener('DOMContentLoaded', function() {
  updateModifier("con", strengthInput.value);
});

document.getElementsByName("con")[0].nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("con")[0].value);
  if (currentValue < 20) {
    document.getElementsByName("con")[0].value = currentValue + 1;
    updateModifier("con", document.getElementsByName("con")[0].value);
  }
});

document.getElementsByName("con")[0].nextElementSibling.nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("con")[0].value);
  if (currentValue > 8) {
    document.getElementsByName("con")[0].value = currentValue - 1;
    updateModifier("con", document.getElementsByName("con")[0].value);
  }
});
///////////////////////////////

document.addEventListener('DOMContentLoaded', function() {
  updateModifier("int", strengthInput.value);
});

document.getElementsByName("int")[0].nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("int")[0].value);
  if (currentValue < 20) {
    document.getElementsByName("int")[0].value = currentValue + 1;
    updateModifier("int", document.getElementsByName("int")[0].value);
  }
});

document.getElementsByName("int")[0].nextElementSibling.nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("int")[0].value);
  if (currentValue > 8) {
    document.getElementsByName("int")[0].value = currentValue - 1;
    updateModifier("int", document.getElementsByName("int")[0].value);
  }
});

//////////////////////////////////////////////

document.addEventListener('DOMContentLoaded', function() {
  updateModifier("wis", strengthInput.value);
});

document.getElementsByName("wis")[0].nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("wis")[0].value);
  if (currentValue < 20) {
    document.getElementsByName("wis")[0].value = currentValue + 1;
    updateModifier("wis", document.getElementsByName("wis")[0].value);
  }
});

document.getElementsByName("wis")[0].nextElementSibling.nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("wis")[0].value);
  if (currentValue > 8) {
    document.getElementsByName("wis")[0].value = currentValue - 1;
    updateModifier("wis", document.getElementsByName("wis")[0].value);
  }
});
/////////////////////////////////////

document.addEventListener('DOMContentLoaded', function() {
  updateModifier("cha", strengthInput.value);
});

document.getElementsByName("cha")[0].nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("cha")[0].value);
  if (currentValue < 20) {
    document.getElementsByName("cha")[0].value = currentValue + 1;
    updateModifier("cha", document.getElementsByName("cha")[0].value);
  }
});

document.getElementsByName("cha")[0].nextElementSibling.nextElementSibling.addEventListener('click', function() {
  const currentValue = parseInt(document.getElementsByName("cha")[0].value);
  if (currentValue > 8) {
    document.getElementsByName("cha")[0].value = currentValue - 1;
    updateModifier("cha", document.getElementsByName("cha")[0].value);
  }
});

//////////////////////////////////////////////////

function updateModifier(stat, value) {
  const modifier = Math.floor((value - 10) / 2);
  const modifierDisplay = document.getElementById(stat + "-modifier");
  if (modifierDisplay) {
    modifierDisplay.textContent = modifier >= 0 ? "+" + modifier : modifier;
  } else {
    const inputElement = document.getElementsByName(stat)[0];
    const modifierElement = document.createElement("span");
    modifierElement.id = stat + "-modifier";
    modifierElement.textContent = modifier >= 0 ? "+" + modifier : modifier;
    inputElement.parentNode.insertBefore(modifierElement, inputElement.nextSibling);
  }
}

document.getElementById("randomizeGold").addEventListener('click', randomizeGold);
function randomizeGold() {
  const goldAmount = document.getElementById("goldAmount");
  const randomGold = Math.floor(Math.random() * 20) + 1;
  goldAmount.textContent = "Gold Amount: " + randomGold;
}