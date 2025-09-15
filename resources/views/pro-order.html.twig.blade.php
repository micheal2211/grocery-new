{# templates/order/pro-order.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Your Orders{% endblock %}

{% block styles %}
    <style>
        /* Your CSS here */
    </style>
{% endblock %}

{% block body %}
<div class="order-container">
    {% if orders|length > 0 %}
        {% for order in orders %}
            <div class="order-card">
                <p>Order ID: <span>{{ order.id ?? 'N/A' }}</span></p>
                <p>Date: <span>{{ order.placed_on|date('Y-m-d H:i:s') }}</span></p>
                {# ... other fields #}
            </div>
        {% endfor %}
    {% else %}
        <p>No orders found</p>
    {% endif %}
</div>
{% endblock %}