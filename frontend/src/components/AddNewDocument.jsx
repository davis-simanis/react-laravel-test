import axiosClient from "../axios-client";

const onAddMore = (e) => {
    e.preventDefault();

    console.log('Add more');
}

const onFormSave = (e) => {
    e.preventDefault();

    const payload = {};
    const { target } = e;

    for (let element of target.elements || []) {
        if (element.type === 'checkbox') {
            payload[element.id] = element.checked;
        } else {
            element.id ? payload[element.id] = element.value : null;
        }
    }

    Object.keys(payload).length && axiosClient.put('/v1/documents', payload);
}

function AddNewDocument() {
    return (
        <div className="AddNewDocument-Wrapper">
            <form onSubmit={onFormSave}>
                <label>Document title</label>
                <input type="text" id="title" />
                <div />
                <label>Field sequence (weight)</label>
                <input type="number" id="sequence" />
                <label>Field type</label>
                <select id="type">
                    <option>input</option>
                </select>
                <label>Field name</label>
                <input type="text" id="field_name" />
                <input type="checkbox" id="is_mandatory" />
                <div className="AddNewDocument-FormDivider" />
                <div className="AddNewDocument-FormActionWrapper">
                    <button onClick={onAddMore}>Add more</button>
                    <button>Save</button>
                </div>
            </form>
        </div>
    )
}

export default AddNewDocument;