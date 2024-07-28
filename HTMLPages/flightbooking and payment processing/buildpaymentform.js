import React, { useState } from "react";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";

const PaymentPage = ({ bookingDetails, onBackToBooking }) => {
  const [cardNumber, setCardNumber] = useState("");
  const [expiryDate, setExpiryDate] = useState("");
  const [cvv, setCvv] = useState("");
  const [cardType, setCardType] = useState("");
  const [error, setError] = useState("");
  const [bookingConfirmed, setBookingConfirmed] = useState(false);

  const validateCard = () => {
    if (cardNumber.length !== 16) {
      setError("Card number must be 16 digits");
      return false;
    }

    if (cardType === "Master Card" && !cardNumber.startsWith("5")) {
      setError("Invalid Master Card number");
      return false;
    }

    if (cardType === "Visa Card" && !cardNumber.startsWith("4")) {
      setError("Invalid Visa Card number");
      return false;
    }

    if (cardType === "Discovery Card" && !cardNumber.startsWith("6")) {
      setError("Invalid Discovery Card number");
      return false;
    }

    const [month, year] = expiryDate.split("/");
    const expiryDateObj = new Date(parseInt("20" + year), parseInt(month) - 1);
    if (expiryDateObj < new Date(2025, 7, 30)) {
      setError("Card expiry date must be after 8/30/2025");
      return false;
    }

    if (cvv.length !== 3) {
      setError("CVV must be 3 digits");
      return false;
    }

    setError("");
    return true;
  };

  const handleSubmit = () => {
    if (validateCard()) {
      setBookingConfirmed(true);
    }
  };

  if (bookingConfirmed) {
    return (
      <Card className="w-full max-w-md mx-auto">
        <CardHeader>
          <CardTitle>Booking Confirmed</CardTitle>
        </CardHeader>
        <CardContent>
          <p>Your flight is booked for {bookingDetails.departureDate}.</p>
          <p>From: {bookingDetails.fromCountry}</p>
          <p>To: {bookingDetails.toCountry}</p>
          <p>Ticket Type: {bookingDetails.ticketType}</p>
          <p>Price: ${bookingDetails.price.toFixed(2)}</p>
          <p>Flight Time: {new Date().toLocaleTimeString()}</p>
        </CardContent>
      </Card>
    );
  }

  return (
    <Card className="w-full max-w-md mx-auto">
      <CardHeader>
        <CardTitle>Payment Details</CardTitle>
      </CardHeader>
      <CardContent>
        <form className="space-y-4">
          <Select onValueChange={setCardType}>
            <SelectTrigger>
              <SelectValue placeholder="Select Card Type" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="Master Card">Master Card</SelectItem>
              <SelectItem value="Visa Card">Visa Card</SelectItem>
              <SelectItem value="Discovery Card">Discovery Card</SelectItem>
            </SelectContent>
          </Select>

          <Input
            type="text"
            placeholder="Card Number"
            value={cardNumber}
            onChange={(e) =>
              setCardNumber(e.target.value.replace(/\D/g, "").slice(0, 16))
            }
          />

          <Input
            type="text"
            placeholder="Expiry Date (MM/YY)"
            value={expiryDate}
            onChange={(e) => setExpiryDate(e.target.value)}
          />

          <Input
            type="text"
            placeholder="CVV"
            value={cvv}
            onChange={(e) =>
              setCvv(e.target.value.replace(/\D/g, "").slice(0, 3))
            }
          />

          {error && <p className="text-red-500">{error}</p>}

          <Button onClick={handleSubmit} className="w-full">
            Confirm Payment
          </Button>

          <Button
            onClick={onBackToBooking}
            variant="outline"
            className="w-full"
          >
            Back to Booking
          </Button>
        </form>
      </CardContent>
    </Card>
  );
};

export default PaymentPage;
