async function do_post(url, data){
    // Configuración de la solicitud POST
    const requestOptions = {
        method: 'POST',
        body: jsonToFormData(data), // Convertimos el objeto JavaScript a JSON
    };

    // Realizar la solicitud POST
    const response = await fetch(url, requestOptions);
    return await response.json();
}

function jsonToFormData(json) {
    const formData = new FormData();
  
    for (const key in json) {
        console.log(key)
      if (json.hasOwnProperty(key)) {
        formData.append(key, json[key]);
      }
    }
  
    return formData;
  }