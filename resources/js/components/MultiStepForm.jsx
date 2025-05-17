import React, { useState } from "react";

const MultiStepForm = () => {
    const [step, setStep] = useState(1);
    const [data, setData] = useState({
        goal: "",
        audience: { location: "", age: "", gender: "", interests: [] },
        budget: { total: 0, daily: 0 },
        channels: [],
        content: { type: "", file: null, text: "" },
        schedule: { start: "", end: "" },
    });

    const nextStep = () => setStep(step + 1);
    const prevStep = () => setStep(step - 1);

    const handleSubmit = () => {
        console.log("Final Data:", data);
        alert("Campaign Submitted!");
    };

    return (
        <div>
            <h2>Step {step}</h2>
            {step === 1 && (
                <Step1 data={data} setData={setData} nextStep={nextStep} />
            )}
            {step === 2 && (
                <Step2 data={data} setData={setData} nextStep={nextStep} prevStep={prevStep} />
            )}
            {step === 3 && (
                <Step3 data={data} setData={setData} handleSubmit={handleSubmit} prevStep={prevStep} />
            )}
        </div>
    );
};

const Step1 = ({ data, setData, nextStep }) => (
    <div>
        <h3>Select Campaign Goal</h3>
        <select
            value={data.goal}
            onChange={(e) => setData({ ...data, goal: e.target.value })}
        >
            <option value="">-- Select a Goal --</option>
            <option value="branding">Branding</option>
            <option value="sales">Sales</option>
            <option value="traffic">Traffic</option>
            <option value="leads">Leads</option>
        </select>
        <button onClick={nextStep}>Next</button>
    </div>
);

const Step2 = ({ data, setData, nextStep, prevStep }) => (
    <div>
        <h3>Define Your Audience</h3>
        <input
            type="text"
            placeholder="Location"
            value={data.audience.location}
            onChange={(e) =>
                setData({ ...data, audience: { ...data.audience, location: e.target.value } })
            }
        />
        <input
            type="text"
            placeholder="Age Range"
            value={data.audience.age}
            onChange={(e) =>
                setData({ ...data, audience: { ...data.audience, age: e.target.value } })
            }
        />
        <button onClick={prevStep}>Back</button>
        <button onClick={nextStep}>Next</button>
    </div>
);

const Step3 = ({ data, handleSubmit, prevStep }) => (
    <div>
        <h3>Review and Submit</h3>
        <pre>{JSON.stringify(data, null, 2)}</pre>
        <button onClick={prevStep}>Back</button>
        <button onClick={handleSubmit}>Submit</button>
    </div>
);

export default MultiStepForm;
